<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TourObject\BulkDestroyTourObject;
use App\Http\Requests\Admin\TourObject\DestroyTourObject;
use App\Http\Requests\Admin\TourObject\IndexTourObject;
use App\Http\Requests\Admin\TourObject\StoreTourObject;
use App\Http\Requests\Admin\TourObject\UpdateTourObject;
use App\Models\TourObject;
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

class TourObjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTourObject $request
     * @return array|Factory|View
     */
    public function index(IndexTourObject $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TourObject::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['address', 'creator_id', 'id', 'latitude', 'longitude', 'photos', 'title', 'tour_guide_id'],

            // set columns to searchIn
            ['address', 'comment', 'description', 'id', 'photos', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tour-object.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tour-object.create');

        return view('admin.tour-object.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTourObject $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTourObject $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TourObject
        $tourObject = TourObject::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tour-objects'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tour-objects');
    }

    /**
     * Display the specified resource.
     *
     * @param TourObject $tourObject
     * @throws AuthorizationException
     * @return void
     */
    public function show(TourObject $tourObject)
    {
        $this->authorize('admin.tour-object.show', $tourObject);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TourObject $tourObject
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TourObject $tourObject)
    {
        $this->authorize('admin.tour-object.edit', $tourObject);


        return view('admin.tour-object.edit', [
            'tourObject' => $tourObject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTourObject $request
     * @param TourObject $tourObject
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTourObject $request, TourObject $tourObject)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TourObject
        $tourObject->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tour-objects'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tour-objects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTourObject $request
     * @param TourObject $tourObject
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTourObject $request, TourObject $tourObject)
    {
        $tourObject->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTourObject $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTourObject $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('tourObjects')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
