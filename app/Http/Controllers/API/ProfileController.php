<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ProfileStoreRequest;
use App\Http\Requests\API\ProfileUpdateRequest;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ProfileCollection
     */
    public function index(Request $request)
    {
        $profiles = Profile::paginate($request->count ?? config('app.results_per_page'));

        return new ProfileCollection($profiles);
    }

    /**
     * @param \App\Http\Requests\API\ProfileStoreRequest $request
     * @return \App\Http\Resources\ProfileResource
     */
    public function store(ProfileStoreRequest $request)
    {
        $profile = Profile::create($request->validated());

        return new ProfileResource($profile);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \App\Http\Resources\ProfileResource
     */
    public function show(Request $request, Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * @param \App\Http\Requests\API\ProfileUpdateRequest $request
     * @param \App\Models\Profile $profile
     * @return \App\Http\Resources\ProfileResource
     */
    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $profile->update($request->validated());

        return new ProfileResource($profile);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Profile $profile)
    {
        $profile->delete();

        return response()->noContent();
    }
}
