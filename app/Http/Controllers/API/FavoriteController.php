<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\FavoriteStoreRequest;
use App\Http\Requests\API\FavoriteUpdateRequest;
use App\Http\Resources\FavoriteCollection;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\TourCollection;
use App\Models\Favorite;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return FavoriteCollection|TourCollection
     */
    public function index(Request $request)
    {
        $size = $request->get("size") ?? config('app.results_per_page');

        $user = Auth::user();

        $favorites = Favorite::query()->with([
            "tour",
            'tour.tourObjects',
            'tour.tourCategories',
            'tour.durationType',
            'tour.tourType',
            'tour.creator.profile',
            'tour.schedules',
            'tour.reviews'

        ])->where('user_id', $user->id)
            ->paginate($size);

        return new FavoriteCollection($favorites);
    }

    /**
     * @param \App\Http\Requests\API\FavoriteStoreRequest $request
     * @return \App\Http\Resources\FavoriteResource
     */
    public function store(FavoriteStoreRequest $request)
    {
        $tmp = (object)$request->all();
        $tmp->user_id = Auth::user()->id;

        $favorite = Favorite::query()->with(["tour"])->where("user_id", Auth::user()->id)
            ->where("tour_id", $tmp->tour_id)
            ->first();

        if (!is_null($favorite))
            return new FavoriteResource($favorite);

        $favorite = Favorite::create((array)$tmp);

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
    public function destroy(Request $request, $id)
    {
        $favorite = Favorite::query()
            ->where("user_id", Auth::user()->id)
            ->where("tour_id", $id)->first();

        if (is_null($favorite))
            return response()->json(["message" => "Not Found"], 404);

        $favorite->delete();

        return response()->noContent();
    }
}
