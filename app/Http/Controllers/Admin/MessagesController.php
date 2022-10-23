<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Message\BulkDestroyMessage;
use App\Http\Requests\Admin\Message\DestroyMessage;
use App\Http\Requests\Admin\Message\IndexMessage;
use App\Http\Requests\Admin\Message\StoreMessage;
use App\Http\Requests\Admin\Message\UpdateMessage;
use App\Models\Message;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MessagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMessage $request
     * @return array|Factory|View
     */
    public function index(IndexMessage $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Message::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['content', 'id', 'read_at', 'tour_guide_id', 'transaction_id', 'user_id'],

            // set columns to searchIn
            ['content', 'id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.message.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.message.create');

        return view('admin.message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMessage $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMessage $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Message
        $message = Message::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/messages'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/messages');
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @throws AuthorizationException
     * @return void
     */
    public function show(Message $message)
    {
        $this->authorize('admin.message.show', $message);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Message $message
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Message $message)
    {
        $this->authorize('admin.message.edit', $message);


        return view('admin.message.edit', [
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMessage $request
     * @param Message $message
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMessage $request, Message $message)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Message
        $message->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/messages'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/messages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMessage $request
     * @param Message $message
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMessage $request, Message $message)
    {
        $message->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMessage $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMessage $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('messages')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
