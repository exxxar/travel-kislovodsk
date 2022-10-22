<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TouristGroup\BulkDestroyTouristGroup;
use App\Http\Requests\Admin\TouristGroup\DestroyTouristGroup;
use App\Http\Requests\Admin\TouristGroup\IndexTouristGroup;
use App\Http\Requests\Admin\TouristGroup\StoreTouristGroup;
use App\Http\Requests\Admin\TouristGroup\UpdateTouristGroup;
use App\Models\TouristGroup;
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

class TouristGroupsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTouristGroup $request
     * @return array|Factory|View
     */
    public function index(IndexTouristGroup $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TouristGroup::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['areas_of_rf', 'charge_batteries', 'children_ages', 'children_count', 'dangerous_route_section', 'date_and_method_communication_sessions', 'date_and_method_informing', 'difficulty_category', 'emergency_exit_routest', 'final_destination_point', 'first_aid_equipment', 'foreigners_count', 'foreigners_countries', 'id', 'insurance', 'loding_points', 'medical_professionals', 'mobile_devices', 'radio_station', 'registration_at', 'return_at', 'route_distance', 'satelite_phone', 'start_at', 'start_point', 'summary_members_count', 'tourist_agency_id', 'tourist_guide_id'],

            // set columns to searchIn
            ['additional_info', 'areas_of_rf', 'charge_batteries', 'children_ages', 'dangerous_route_section', 'date_and_method_communication_sessions', 'date_and_method_informing', 'difficulty_category', 'emergency_exit_routest', 'final_destination_point', 'first_aid_equipment', 'foreigners_countries', 'id', 'insurance', 'loding_points', 'medical_professionals', 'mobile_devices', 'radio_station', 'satelite_phone', 'start_point']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tourist-group.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tourist-group.create');

        return view('admin.tourist-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTouristGroup $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTouristGroup $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TouristGroup
        $touristGroup = TouristGroup::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tourist-groups'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tourist-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param TouristGroup $touristGroup
     * @throws AuthorizationException
     * @return void
     */
    public function show(TouristGroup $touristGroup)
    {
        $this->authorize('admin.tourist-group.show', $touristGroup);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TouristGroup $touristGroup
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TouristGroup $touristGroup)
    {
        $this->authorize('admin.tourist-group.edit', $touristGroup);


        return view('admin.tourist-group.edit', [
            'touristGroup' => $touristGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTouristGroup $request
     * @param TouristGroup $touristGroup
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTouristGroup $request, TouristGroup $touristGroup)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TouristGroup
        $touristGroup->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tourist-groups'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tourist-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTouristGroup $request
     * @param TouristGroup $touristGroup
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTouristGroup $request, TouristGroup $touristGroup)
    {
        $touristGroup->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTouristGroup $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTouristGroup $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('touristGroups')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
