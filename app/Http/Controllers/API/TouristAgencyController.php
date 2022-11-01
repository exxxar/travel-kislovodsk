<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TouristAgencyStoreRequest;
use App\Http\Requests\API\TouristAgencyUpdateRequest;
use App\Http\Resources\TouristAgencyCollection;
use App\Http\Resources\TouristAgencyResource;
use App\Models\TouristAgency;
use Illuminate\Http\Request;

class TouristAgencyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TouristAgencyCollection
     */
    public function index(Request $request)
    {
        $touristAgencies = TouristAgency::paginate($request->count ?? config('app.results_per_page'));

        return new TouristAgencyCollection($touristAgencies);
    }

    /**
     * @param \App\Http\Requests\API\TouristAgencyStoreRequest $request
     * @return \App\Http\Resources\TouristAgencyResource
     */
    public function store(TouristAgencyStoreRequest $request)
    {
        $touristAgency = TouristAgency::create($request->validated());

        return new TouristAgencyResource($touristAgency);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TouristAgency $touristAgency
     * @return \App\Http\Resources\TouristAgencyResource
     */
    public function show(Request $request, TouristAgency $touristAgency)
    {
        return new TouristAgencyResource($touristAgency);
    }

    /**
     * @param \App\Http\Requests\API\TouristAgencyUpdateRequest $request
     * @param \App\Models\TouristAgency $touristAgency
     * @return \App\Http\Resources\TouristAgencyResource
     */
    public function update(TouristAgencyUpdateRequest $request, TouristAgency $touristAgency)
    {
        $touristAgency->update($request->validated());

        return new TouristAgencyResource($touristAgency);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TouristAgency $touristAgency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TouristAgency $touristAgency)
    {
        $touristAgency->delete();

        return response()->noContent();
    }
}
