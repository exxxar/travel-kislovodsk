<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tour\BulkDestroyTour;
use App\Http\Requests\Admin\Tour\DestroyTour;
use App\Http\Requests\Admin\Tour\IndexTour;
use App\Http\Requests\Admin\Tour\StoreTour;
use App\Http\Requests\Admin\Tour\UpdateTour;
use App\Models\Tour;
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

class ToursController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTour $request
     * @return array|Factory|View
     */
    public function index(IndexTour $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Tour::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['creator_id', 'duration', 'duration_type_id', 'exclude_services', 'id', 'images', 'include_services', 'is_active', 'is_draft', 'is_hot', 'movement_type_id', 'payment_type_id', 'preview_image', 'prices', 'rating', 'start_latitude', 'start_longitude', 'start_place', 'title', 'tour_object_id', 'tour_type_id', 'verified_at'],

            // set columns to searchIn
            ['description', 'duration', 'exclude_services', 'id', 'images', 'include_services', 'preview_image', 'prices', 'start_comment', 'start_place', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tour.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tour.create');

        return view('admin.tour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTour $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTour $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Tour
        $tour = Tour::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tours'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tours');
    }

    /**
     * Display the specified resource.
     *
     * @param Tour $tour
     * @throws AuthorizationException
     * @return void
     */
    public function show(Tour $tour)
    {
        $this->authorize('admin.tour.show', $tour);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tour $tour
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Tour $tour)
    {
        $this->authorize('admin.tour.edit', $tour);


        return view('admin.tour.edit', [
            'tour' => $tour,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTour $request
     * @param Tour $tour
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTour $request, Tour $tour)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Tour
        $tour->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tours'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTour $request
     * @param Tour $tour
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTour $request, Tour $tour)
    {
        $tour->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTour $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTour $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('tours')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
