<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DictionaryType\BulkDestroyDictionaryType;
use App\Http\Requests\Admin\DictionaryType\DestroyDictionaryType;
use App\Http\Requests\Admin\DictionaryType\IndexDictionaryType;
use App\Http\Requests\Admin\DictionaryType\StoreDictionaryType;
use App\Http\Requests\Admin\DictionaryType\UpdateDictionaryType;
use App\Models\DictionaryType;
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

class DictionaryTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDictionaryType $request
     * @return array|Factory|View
     */
    public function index(IndexDictionaryType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(DictionaryType::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title'],

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

        return view('admin.dictionary-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.dictionary-type.create');

        return view('admin.dictionary-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDictionaryType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDictionaryType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the DictionaryType
        $dictionaryType = DictionaryType::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/dictionary-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/dictionary-types');
    }

    /**
     * Display the specified resource.
     *
     * @param DictionaryType $dictionaryType
     * @throws AuthorizationException
     * @return void
     */
    public function show(DictionaryType $dictionaryType)
    {
        $this->authorize('admin.dictionary-type.show', $dictionaryType);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DictionaryType $dictionaryType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(DictionaryType $dictionaryType)
    {
        $this->authorize('admin.dictionary-type.edit', $dictionaryType);


        return view('admin.dictionary-type.edit', [
            'dictionaryType' => $dictionaryType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDictionaryType $request
     * @param DictionaryType $dictionaryType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDictionaryType $request, DictionaryType $dictionaryType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values DictionaryType
        $dictionaryType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/dictionary-types'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/dictionary-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDictionaryType $request
     * @param DictionaryType $dictionaryType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDictionaryType $request, DictionaryType $dictionaryType)
    {
        $dictionaryType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDictionaryType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDictionaryType $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('dictionaryTypes')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
