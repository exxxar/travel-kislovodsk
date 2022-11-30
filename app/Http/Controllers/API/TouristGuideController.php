<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TouristGuideStoreRequest;
use App\Http\Requests\API\TouristGuideUpdateRequest;
use App\Http\Resources\TouristGuideCollection;
use App\Http\Resources\TouristGuideResource;
use App\Models\TouristGuide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function show(Request $request, $id)
    {
        $touristGuide = User::query()
            ->with(["profile"])
            ->where("id",$id)->first();

        return view('pages.guide',["guide"=>json_encode(new TouristGuideResource($touristGuide))]);

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

    public function updateCompanyInfo(Request $request){
        $request->validate([
            "title"=>"required",
            "description"=>"required",
            "ogrn"=>"required",
            "inn"=>"required",
            "law_address"=>"required",
        ]);

        $userId = Auth::user()->id;

        $user = User::query()
            ->with(["profile", "company"])
            ->where("id", $userId)
            ->first();

        $company = $user->company;
        $company->title = $request->title;
        $company->description = $request->description;
        $company->ogrn = $request->ogrn;
        $company->inn = $request->inn;
        $company->law_address = $request->law_address;
        $company->save();

        return response()->noContent();
    }

    public function updatePassword(Request $request){
        $request->validate([
            "password"=>'min:6|required_with:confirm_password|same:confirm_password',
            "confirm_password"=>"required",
        ]);

        $userId = Auth::user()->id;

        $user = User::query()
            ->with(["profile", "company"])
            ->where("id", $userId)
            ->first();

        $user->passowrd = bcrypt($request->password);
        $user->save();

        return response()->noContent();
    }

    public function updateProfileInfo(Request $request){

        $request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "patronymic"=>"required",
        ]);

        $userId = Auth::user()->id;

        $user = User::query()
            ->with(["profile", "company"])
            ->where("id", $userId)
            ->first();

        $profile = $user->profile;
        $profile->fname = $request->first_name;
        $profile->tname = $request->last_name;
        $profile->sname = $request->patronymic;
        $profile->save();

        return response()->noContent();
    }

    public function uploadImage(Request $request){


        $userId = Auth::user()->id;

        $user = User::query()
            ->with(["profile", "company"])
            ->where("id", $userId)
            ->first();

        $path = '/user/' . $userId;
        if (!Storage::exists('/public' . $path)) {
            Storage::makeDirectory('/public' . $path);
        }

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $key => $file) {
                $name = $file->getClientOriginalName();
              //  $ext = $file->getClientOriginalExtension();


                $file->storeAs("/public", $path . '/' . $name );
                $url = Storage::url('user/' . $userId . "/" . $name );

                $profile = $user->profile;
                $profile->photo = $url;
                $profile->save();

                $company = $user->company;
                $company->photo = $url;
                $company->save();

            }

        }

        return response()->noContent();
    }
}
