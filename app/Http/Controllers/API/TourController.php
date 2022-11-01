<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourStoreRequest;
use App\Http\Requests\API\TourUpdateRequest;
use App\Http\Resources\TourCollection;
use App\Http\Resources\TourResource;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TourCollection
     */
    public function index(Request $request)
    {
        $tours = Tour::paginate($request->count ?? config('app.results_per_page'));

        return new TourCollection($tours);
    }

    /**
     * @param \App\Http\Requests\API\TourStoreRequest $request
     * @return \App\Http\Resources\TourResource
     */
    public function store(TourStoreRequest $request)
    {
        $tour = Tour::create($request->validated());

        return new TourResource($tour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tour $tour
     * @return \App\Http\Resources\TourResource
     */
    public function show(Request $request, Tour $tour)
    {
        return new TourResource($tour);
    }

    /**
     * @param \App\Http\Requests\API\TourUpdateRequest $request
     * @param \App\Models\Tour $tour
     * @return \App\Http\Resources\TourResource
     */
    public function update(TourUpdateRequest $request, Tour $tour)
    {
        $tour->update($request->validated());

        return new TourResource($tour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tour $tour)
    {
        $tour->delete();

        return response()->noContent();
    }
}
