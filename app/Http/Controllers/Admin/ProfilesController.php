<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\BulkDestroyProfile;
use App\Http\Requests\Admin\Profile\DestroyProfile;
use App\Http\Requests\Admin\Profile\IndexProfile;
use App\Http\Requests\Admin\Profile\StoreProfile;
use App\Http\Requests\Admin\Profile\UpdateProfile;
use App\Models\Profile;
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

class ProfilesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProfile $request
     * @return array|Factory|View
     */
    public function index(IndexProfile $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Profile::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['fname', 'id', 'photo', 'sname', 'tname'],

            // set columns to searchIn
            ['fname', 'id', 'photo', 'sname', 'tname']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.profile.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.profile.create');

        return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProfile $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProfile $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Profile
        $profile = Profile::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/profiles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param Profile $profile
     * @throws AuthorizationException
     * @return void
     */
    public function show(Profile $profile)
    {
        $this->authorize('admin.profile.show', $profile);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Profile $profile
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Profile $profile)
    {
        $this->authorize('admin.profile.edit', $profile);


        return view('admin.profile.edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfile $request
     * @param Profile $profile
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProfile $request, Profile $profile)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Profile
        $profile->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/profiles'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProfile $request
     * @param Profile $profile
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProfile $request, Profile $profile)
    {
        $profile->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProfile $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProfile $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('profiles')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
