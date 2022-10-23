<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Favorite\BulkDestroyFavorite;
use App\Http\Requests\Admin\Favorite\DestroyFavorite;
use App\Http\Requests\Admin\Favorite\IndexFavorite;
use App\Http\Requests\Admin\Favorite\StoreFavorite;
use App\Http\Requests\Admin\Favorite\UpdateFavorite;
use App\Models\Favorite;
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

class FavoritesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFavorite $request
     * @return array|Factory|View
     */
    public function index(IndexFavorite $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Favorite::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'tour_id', 'user_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.favorite.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.favorite.create');

        return view('admin.favorite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFavorite $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFavorite $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Favorite
        $favorite = Favorite::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/favorites'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/favorites');
    }

    /**
     * Display the specified resource.
     *
     * @param Favorite $favorite
     * @throws AuthorizationException
     * @return void
     */
    public function show(Favorite $favorite)
    {
        $this->authorize('admin.favorite.show', $favorite);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Favorite $favorite
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Favorite $favorite)
    {
        $this->authorize('admin.favorite.edit', $favorite);


        return view('admin.favorite.edit', [
            'favorite' => $favorite,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFavorite $request
     * @param Favorite $favorite
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFavorite $request, Favorite $favorite)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Favorite
        $favorite->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/favorites'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/favorites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFavorite $request
     * @param Favorite $favorite
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFavorite $request, Favorite $favorite)
    {
        $favorite->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFavorite $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFavorite $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('favorites')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
