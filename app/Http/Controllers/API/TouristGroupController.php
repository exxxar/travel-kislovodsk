<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TouristGroupStoreRequest;
use App\Http\Requests\API\TouristGroupUpdateRequest;
use App\Http\Resources\TouristGroupCollection;
use App\Http\Resources\TouristGroupResource;
use App\Models\TouristGroup;
use Illuminate\Http\Request;

class TouristGroupController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TouristGroupCollection
     */
    public function index(Request $request)
    {
        $touristGroups = TouristGroup::paginate($request->count ?? config('app.results_per_page'));

        return new TouristGroupCollection($touristGroups);
    }

    /**
     * @param \App\Http\Requests\API\TouristGroupStoreRequest $request
     * @return \App\Http\Resources\TouristGroupResource
     */
    public function store(TouristGroupStoreRequest $request)
    {
        $touristGroup = TouristGroup::create($request->validated());

        return new TouristGroupResource($touristGroup);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TouristGroup $touristGroup
     * @return \App\Http\Resources\TouristGroupResource
     */
    public function show(Request $request, TouristGroup $touristGroup)
    {
        return new TouristGroupResource($touristGroup);
    }

    /**
     * @param \App\Http\Requests\API\TouristGroupUpdateRequest $request
     * @param \App\Models\TouristGroup $touristGroup
     * @return \App\Http\Resources\TouristGroupResource
     */
    public function update(TouristGroupUpdateRequest $request, TouristGroup $touristGroup)
    {
        $touristGroup->update($request->validated());

        return new TouristGroupResource($touristGroup);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TouristGroup $touristGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TouristGroup $touristGroup)
    {
        $touristGroup->delete();

        return response()->noContent();
    }
}
