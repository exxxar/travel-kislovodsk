<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourHasTourCategoryStoreRequest;
use App\Http\Requests\API\TourHasTourCategoryUpdateRequest;
use App\Http\Resources\TourHasTourCategoryCollection;
use App\Http\Resources\TourHasTourCategoryResource;
use App\Models\TourHasTourCategory;
use Illuminate\Http\Request;

class TourHasTourCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TourHasTourCategoryCollection
     */
    public function index(Request $request)
    {
        $tourHasTourCategories = TourHasTourCategory::paginate($request->count ?? config('app.results_per_page'));

        return new TourHasTourCategoryCollection($tourHasTourCategories);
    }

    /**
     * @param \App\Http\Requests\API\TourHasTourCategoryStoreRequest $request
     * @return \App\Http\Resources\TourHasTourCategoryResource
     */
    public function store(TourHasTourCategoryStoreRequest $request)
    {
        $tourHasTourCategory = TourHasTourCategory::create($request->validated());

        return new TourHasTourCategoryResource($tourHasTourCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TourHasTourCategory $tourHasTourCategory
     * @return \App\Http\Resources\TourHasTourCategoryResource
     */
    public function show(Request $request, TourHasTourCategory $tourHasTourCategory)
    {
        return new TourHasTourCategoryResource($tourHasTourCategory);
    }

    /**
     * @param \App\Http\Requests\API\TourHasTourCategoryUpdateRequest $request
     * @param \App\Models\TourHasTourCategory $tourHasTourCategory
     * @return \App\Http\Resources\TourHasTourCategoryResource
     */
    public function update(TourHasTourCategoryUpdateRequest $request, TourHasTourCategory $tourHasTourCategory)
    {
        $tourHasTourCategory->update($request->validated());

        return new TourHasTourCategoryResource($tourHasTourCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TourHasTourCategory $tourHasTourCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TourHasTourCategory $tourHasTourCategory)
    {
        $tourHasTourCategory->delete();

        return response()->noContent();
    }
}
