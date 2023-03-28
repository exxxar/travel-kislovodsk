<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ProfileStoreRequest;
use App\Http\Requests\API\ProfileUpdateRequest;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserCollection;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ProfileCollection
     */
    public function index(Request $request)
    {
        $users = User::query()
            ->with(["role","profile","company","userLawStatus","documents"])
            ->paginate($request->count ?? config('app.results_per_page'));

        return new UserCollection($users);
    }


    public function search(Request $request)
    {

        $filterObject = (object)[
            "need_removed"=>$request->need_removed ?? false,
            "need_admins"=>$request->need_admins ?? false,
            "need_moderate"=>$request->need_moderate ?? false,
            "need_guides"=>$request->need_guides ?? false,
            "need_tourist"=>$request->need_tourist ?? false,
            "need_all"=>$request->need_all ?? false,
            "need_blocked"=>$request->need_blocked ?? false,
        ];

        $users = User::query()
            ->with(["role","profile","company","userLawStatus","documents"])
            ->withFilters($filterObject)
            ->paginate($request->count ?? config('app.results_per_page'));

        return new UserCollection($users);
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
