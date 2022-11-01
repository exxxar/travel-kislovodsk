<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourHasTourObjectStoreRequest;
use App\Http\Requests\API\TourHasTourObjectUpdateRequest;
use App\Http\Resources\TourHasTourObjectCollection;
use App\Http\Resources\TourHasTourObjectResource;
use App\Models\TourHasTourObject;
use Illuminate\Http\Request;

class TourHasTourObjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TourHasTourObjectCollection
     */
    public function index(Request $request)
    {
        $tourHasTourObjects = TourHasTourObject::paginate($request->count ?? config('app.results_per_page'));

        return new TourHasTourObjectCollection($tourHasTourObjects);
    }

    /**
     * @param \App\Http\Requests\API\TourHasTourObjectStoreRequest $request
     * @return \App\Http\Resources\TourHasTourObjectResource
     */
    public function store(TourHasTourObjectStoreRequest $request)
    {
        $tourHasTourObject = TourHasTourObject::create($request->validated());

        return new TourHasTourObjectResource($tourHasTourObject);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TourHasTourObject $tourHasTourObject
     * @return \App\Http\Resources\TourHasTourObjectResource
     */
    public function show(Request $request, TourHasTourObject $tourHasTourObject)
    {
        return new TourHasTourObjectResource($tourHasTourObject);
    }

    /**
     * @param \App\Http\Requests\API\TourHasTourObjectUpdateRequest $request
     * @param \App\Models\TourHasTourObject $tourHasTourObject
     * @return \App\Http\Resources\TourHasTourObjectResource
     */
    public function update(TourHasTourObjectUpdateRequest $request, TourHasTourObject $tourHasTourObject)
    {
        $tourHasTourObject->update($request->validated());

        return new TourHasTourObjectResource($tourHasTourObject);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TourHasTourObject $tourHasTourObject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TourHasTourObject $tourHasTourObject)
    {
        $tourHasTourObject->delete();

        return response()->noContent();
    }
}
