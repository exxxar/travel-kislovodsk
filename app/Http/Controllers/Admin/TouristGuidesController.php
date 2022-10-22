<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TouristGuide\BulkDestroyTouristGuide;
use App\Http\Requests\Admin\TouristGuide\DestroyTouristGuide;
use App\Http\Requests\Admin\TouristGuide\IndexTouristGuide;
use App\Http\Requests\Admin\TouristGuide\StoreTouristGuide;
use App\Http\Requests\Admin\TouristGuide\UpdateTouristGuide;
use App\Models\TouristGuide;
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

class TouristGuidesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTouristGuide $request
     * @return array|Factory|View
     */
    public function index(IndexTouristGuide $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TouristGuide::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['address', 'birthday', 'home_phone', 'id', 'mobile_phone', 'name', 'office_phone', 'relative_contact_information', 'sname', 'tname'],

            // set columns to searchIn
            ['address', 'home_phone', 'id', 'mobile_phone', 'name', 'office_phone', 'relative_contact_information', 'sname', 'tname']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tourist-guide.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tourist-guide.create');

        return view('admin.tourist-guide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTouristGuide $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTouristGuide $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TouristGuide
        $touristGuide = TouristGuide::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tourist-guides'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tourist-guides');
    }

    /**
     * Display the specified resource.
     *
     * @param TouristGuide $touristGuide
     * @throws AuthorizationException
     * @return void
     */
    public function show(TouristGuide $touristGuide)
    {
        $this->authorize('admin.tourist-guide.show', $touristGuide);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TouristGuide $touristGuide
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TouristGuide $touristGuide)
    {
        $this->authorize('admin.tourist-guide.edit', $touristGuide);


        return view('admin.tourist-guide.edit', [
            'touristGuide' => $touristGuide,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTouristGuide $request
     * @param TouristGuide $touristGuide
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTouristGuide $request, TouristGuide $touristGuide)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TouristGuide
        $touristGuide->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tourist-guides'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tourist-guides');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTouristGuide $request
     * @param TouristGuide $touristGuide
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTouristGuide $request, TouristGuide $touristGuide)
    {
        $touristGuide->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTouristGuide $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTouristGuide $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('touristGuides')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
