<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Document\BulkDestroyDocument;
use App\Http\Requests\Admin\Document\DestroyDocument;
use App\Http\Requests\Admin\Document\IndexDocument;
use App\Http\Requests\Admin\Document\StoreDocument;
use App\Http\Requests\Admin\Document\UpdateDocument;
use App\Models\Document;
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

class DocumentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDocument $request
     * @return array|Factory|View
     */
    public function index(IndexDocument $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Document::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['approved_at', 'company_id', 'id', 'path', 'title', 'valid_to'],

            // set columns to searchIn
            ['description', 'id', 'path', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.document.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.document.create');

        return view('admin.document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDocument $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDocument $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Document
        $document = Document::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/documents'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/documents');
    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @throws AuthorizationException
     * @return void
     */
    public function show(Document $document)
    {
        $this->authorize('admin.document.show', $document);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Document $document)
    {
        $this->authorize('admin.document.edit', $document);


        return view('admin.document.edit', [
            'document' => $document,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDocument $request
     * @param Document $document
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDocument $request, Document $document)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Document
        $document->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/documents'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/documents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDocument $request
     * @param Document $document
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDocument $request, Document $document)
    {
        $document->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDocument $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDocument $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('documents')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
