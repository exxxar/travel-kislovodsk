<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourObjectStoreRequest;
use App\Http\Requests\API\TourObjectUpdateRequest;
use App\Http\Resources\TourObjectCollection;
use App\Http\Resources\TourObjectResource;
use App\Models\TourObject;
use Illuminate\Http\Request;

class TourObjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TourObjectCollection
     */
    public function index(Request $request)
    {
        $tourObjects = TourObject::paginate($request->count ?? config('app.results_per_page'));

        return new TourObjectCollection($tourObjects);
    }

    /**
     * @param \App\Http\Requests\API\TourObjectStoreRequest $request
     * @return \App\Http\Resources\TourObjectResource
     */
    public function store(TourObjectStoreRequest $request)
    {
        $tourObject = TourObject::create($request->validated());

        return new TourObjectResource($tourObject);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TourObject $tourObject
     * @return \App\Http\Resources\TourObjectResource
     */
    public function show(Request $request, TourObject $tourObject)
    {
        return new TourObjectResource($tourObject);
    }

    /**
     * @param \App\Http\Requests\API\TourObjectUpdateRequest $request
     * @param \App\Models\TourObject $tourObject
     * @return \App\Http\Resources\TourObjectResource
     */
    public function update(TourObjectUpdateRequest $request, TourObject $tourObject)
    {
        $tourObject->update($request->validated());

        return new TourObjectResource($tourObject);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TourObject $tourObject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TourObject $tourObject)
    {
        $tourObject->delete();

        return response()->noContent();
    }
}
