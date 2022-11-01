<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TouristMemberStoreRequest;
use App\Http\Requests\API\TouristMemberUpdateRequest;
use App\Http\Resources\ToursistMemberCollection;
use App\Http\Resources\ToursistMemberResource;
use App\Models\TouristMember;
use Illuminate\Http\Request;

class TouristMemberController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ToursistMemberCollection
     */
    public function index(Request $request)
    {
        $touristMembers = TouristMember::paginate($request->count ?? config('app.results_per_page'));

        return new ToursistMemberCollection($touristMembers);
    }

    /**
     * @param \App\Http\Requests\API\TouristMemberStoreRequest $request
     * @return \App\Http\Resources\ToursistMemberResource
     */
    public function store(TouristMemberStoreRequest $request)
    {
        $touristMember = TouristMember::create($request->validated());

        return new ToursistMemberResource($touristMember);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TouristMember $touristMember
     * @return \App\Http\Resources\ToursistMemberResource
     */
    public function show(Request $request, TouristMember $touristMember)
    {
        return new ToursistMemberResource($touristMember);
    }

    /**
     * @param \App\Http\Requests\API\TouristMemberUpdateRequest $request
     * @param \App\Models\TouristMember $toursistMember
     * @return \App\Http\Resources\ToursistMemberResource
     */
    public function update(TouristMemberUpdateRequest $request, TouristMember $touristMember)
    {
        $touristMember->update($request->validated());

        return new ToursistMemberResource($touristMember);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TouristMember $touristMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TouristMember $touristMember)
    {
        $touristMember->delete();

        return response()->noContent();
    }
}
