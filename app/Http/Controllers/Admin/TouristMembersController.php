<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TouristMember\BulkDestroyTouristMember;
use App\Http\Requests\Admin\TouristMember\DestroyTouristMember;
use App\Http\Requests\Admin\TouristMember\IndexTouristMember;
use App\Http\Requests\Admin\TouristMember\StoreTouristMember;
use App\Http\Requests\Admin\TouristMember\UpdateTouristMember;
use App\Models\TouristMember;
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

class TouristMembersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTouristMember $request
     * @return array|Factory|View
     */
    public function index(IndexTouristMember $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TouristMember::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['address', 'birthday', 'full_name', 'id', 'phone', 'tourist_group_id'],

            // set columns to searchIn
            ['address', 'full_name', 'id', 'phone']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tourist-member.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tourist-member.create');

        return view('admin.tourist-member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTouristMember $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTouristMember $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TouristMember
        $touristMember = TouristMember::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tourist-members'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tourist-members');
    }

    /**
     * Display the specified resource.
     *
     * @param TouristMember $touristMember
     * @throws AuthorizationException
     * @return void
     */
    public function show(TouristMember $touristMember)
    {
        $this->authorize('admin.tourist-member.show', $touristMember);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TouristMember $touristMember
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TouristMember $touristMember)
    {
        $this->authorize('admin.tourist-member.edit', $touristMember);


        return view('admin.tourist-member.edit', [
            'touristMember' => $touristMember,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTouristMember $request
     * @param TouristMember $touristMember
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTouristMember $request, TouristMember $touristMember)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TouristMember
        $touristMember->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tourist-members'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tourist-members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTouristMember $request
     * @param TouristMember $touristMember
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTouristMember $request, TouristMember $touristMember)
    {
        $touristMember->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTouristMember $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTouristMember $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('touristMembers')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
