<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\FavoriteStoreRequest;
use App\Http\Requests\API\FavoriteUpdateRequest;
use App\Http\Resources\FavoriteCollection;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FavoriteCollection
     */
    public function index(Request $request)
    {
        $favorites = Favorite::paginate($request->count ?? config('app.results_per_page'));

        return new FavoriteCollection($favorites);
    }

    /**
     * @param \App\Http\Requests\API\FavoriteStoreRequest $request
     * @return \App\Http\Resources\FavoriteResource
     */
    public function store(FavoriteStoreRequest $request)
    {
        $favorite = Favorite::create($request->validated());

        return new FavoriteResource($favorite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return \App\Http\Resources\FavoriteResource
     */
    public function show(Request $request, Favorite $favorite)
    {
        return new FavoriteResource($favorite);
    }

    /**
     * @param \App\Http\Requests\API\FavoriteUpdateRequest $request
     * @param \App\Models\Favorite $favorite
     * @return \App\Http\Resources\FavoriteResource
     */
    public function update(FavoriteUpdateRequest $request, Favorite $favorite)
    {
        $favorite->update($request->validated());

        return new FavoriteResource($favorite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Favorite $favorite)
    {
        $favorite->delete();

        return response()->noContent();
    }
}
