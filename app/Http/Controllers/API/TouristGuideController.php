<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TouristGuideStoreRequest;
use App\Http\Requests\API\TouristGuideUpdateRequest;
use App\Http\Resources\TouristGuideCollection;
use App\Http\Resources\TouristGuideResource;
use App\Models\TouristGuide;
use Illuminate\Http\Request;

class TouristGuideController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TouristGuideCollection
     */
    public function index(Request $request)
    {
        $touristGuides = TouristGuide::paginate($request->count ?? config('app.results_per_page'));

        return new TouristGuideCollection($touristGuides);
    }

    /**
     * @param \App\Http\Requests\API\TouristGuideStoreRequest $request
     * @return \App\Http\Resources\TouristGuideResource
     */
    public function store(TouristGuideStoreRequest $request)
    {
        $touristGuide = TouristGuide::create($request->validated());

        return new TouristGuideResource($touristGuide);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TouristGuide $touristGuide
     * @return \App\Http\Resources\TouristGuideResource
     */
    public function show(Request $request, TouristGuide $touristGuide)
    {
        return new TouristGuideResource($touristGuide);
    }

    /**
     * @param \App\Http\Requests\API\TouristGuideUpdateRequest $request
     * @param \App\Models\TouristGuide $touristGuide
     * @return \App\Http\Resources\TouristGuideResource
     */
    public function update(TouristGuideUpdateRequest $request, TouristGuide $touristGuide)
    {
        $touristGuide->update($request->validated());

        return new TouristGuideResource($touristGuide);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TouristGuide $touristGuide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TouristGuide $touristGuide)
    {
        $touristGuide->delete();

        return response()->noContent();
    }
}
