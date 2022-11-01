<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\UserWatchTourStoreRequest;
use App\Http\Requests\API\UserWatchTourUpdateRequest;
use App\Http\Resources\UserWatchTourCollection;
use App\Http\Resources\UserWatchTourResource;
use App\Models\UserWatchTours;
use Illuminate\Http\Request;

class UserWatchToursController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UserWatchTourCollection
     */
    public function index(Request $request)
    {
        $userWatchTours = UserWatchTours::paginate($request->count ?? config('app.results_per_page'));

        return new UserWatchTourCollection($userWatchTours);
    }

    /**
     * @param \App\Http\Requests\API\UserWatchTourStoreRequest $request
     * @return \App\Http\Resources\UserWatchTourResource
     */
    public function store(UserWatchTourStoreRequest $request)
    {
        $userWatchTour = UserWatchTours::create($request->validated());

        return new UserWatchTourResource($userWatchTour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserWatchTours $userWatchTour
     * @return \App\Http\Resources\UserWatchTourResource
     */
    public function show(Request $request, UserWatchTours $userWatchTour)
    {
        return new UserWatchTourResource($userWatchTour);
    }

    /**
     * @param \App\Http\Requests\API\UserWatchTourUpdateRequest $request
     * @param \App\Models\UserWatchTours $userWatchTour
     * @return \App\Http\Resources\UserWatchTourResource
     */
    public function update(UserWatchTourUpdateRequest $request, UserWatchTours $userWatchTour)
    {
        $userWatchTour->update($request->validated());

        return new UserWatchTourResource($userWatchTour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserWatchTours $userWatchTour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserWatchTours $userWatchTour)
    {
        $userWatchTour->delete();

        return response()->noContent();
    }
}
