<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dictionary\BulkDestroyDictionary;
use App\Http\Requests\Admin\Dictionary\DestroyDictionary;
use App\Http\Requests\Admin\Dictionary\IndexDictionary;
use App\Http\Requests\Admin\Dictionary\StoreDictionary;
use App\Http\Requests\Admin\Dictionary\UpdateDictionary;
use App\Models\Dictionary;
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

class DictionariesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDictionary $request
     * @return array|Factory|View
     */
    public function index(IndexDictionary $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Dictionary::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['dictionary_type_id', 'id', 'title'],

            // set columns to searchIn
            ['id', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.dictionary.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.dictionary.create');

        return view('admin.dictionary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDictionary $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDictionary $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Dictionary
        $dictionary = Dictionary::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/dictionaries'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/dictionaries');
    }

    /**
     * Display the specified resource.
     *
     * @param Dictionary $dictionary
     * @throws AuthorizationException
     * @return void
     */
    public function show(Dictionary $dictionary)
    {
        $this->authorize('admin.dictionary.show', $dictionary);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dictionary $dictionary
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Dictionary $dictionary)
    {
        $this->authorize('admin.dictionary.edit', $dictionary);


        return view('admin.dictionary.edit', [
            'dictionary' => $dictionary,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDictionary $request
     * @param Dictionary $dictionary
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDictionary $request, Dictionary $dictionary)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Dictionary
        $dictionary->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/dictionaries'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/dictionaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDictionary $request
     * @param Dictionary $dictionary
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDictionary $request, Dictionary $dictionary)
    {
        $dictionary->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDictionary $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDictionary $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('dictionaries')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
