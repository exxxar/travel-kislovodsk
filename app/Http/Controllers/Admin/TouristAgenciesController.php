<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TouristAgency\BulkDestroyTouristAgency;
use App\Http\Requests\Admin\TouristAgency\DestroyTouristAgency;
use App\Http\Requests\Admin\TouristAgency\IndexTouristAgency;
use App\Http\Requests\Admin\TouristAgency\StoreTouristAgency;
use App\Http\Requests\Admin\TouristAgency\UpdateTouristAgency;
use App\Models\TouristAgency;
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

class TouristAgenciesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTouristAgency $request
     * @return array|Factory|View
     */
    public function index(IndexTouristAgency $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TouristAgency::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'phone', 'title'],

            // set columns to searchIn
            ['id', 'phone', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tourist-agency.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tourist-agency.create');

        return view('admin.tourist-agency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTouristAgency $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTouristAgency $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TouristAgency
        $touristAgency = TouristAgency::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tourist-agencies'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tourist-agencies');
    }

    /**
     * Display the specified resource.
     *
     * @param TouristAgency $touristAgency
     * @throws AuthorizationException
     * @return void
     */
    public function show(TouristAgency $touristAgency)
    {
        $this->authorize('admin.tourist-agency.show', $touristAgency);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TouristAgency $touristAgency
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TouristAgency $touristAgency)
    {
        $this->authorize('admin.tourist-agency.edit', $touristAgency);


        return view('admin.tourist-agency.edit', [
            'touristAgency' => $touristAgency,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTouristAgency $request
     * @param TouristAgency $touristAgency
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTouristAgency $request, TouristAgency $touristAgency)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TouristAgency
        $touristAgency->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tourist-agencies'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tourist-agencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTouristAgency $request
     * @param TouristAgency $touristAgency
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTouristAgency $request, TouristAgency $touristAgency)
    {
        $touristAgency->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTouristAgency $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTouristAgency $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('touristAgencies')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
