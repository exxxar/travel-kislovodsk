<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TouristGuideStoreRequest;
use App\Http\Requests\API\TouristGuideUpdateRequest;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\TouristGuideCollection;
use App\Http\Resources\TouristGuideResource;
use App\Models\Document;
use App\Models\TouristGuide;
use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TouristController extends Controller
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
            ->with(["profile", "company"])
            ->where("id",$id)
            ->first();

        if (is_null($touristGuide))
            return redirect()->route("page.main");

        if (is_null($touristGuide->company))
            return redirect()->route("page.main");

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

    public function updateAccounting(Request $request){
        $request->validate([
            "email"=>'required|email',
            "phone"=>"required",
            "name"=>"required",
        ]);

        $userId = Auth::user()->id;


        $user = User::query()
            ->with(["profile", "company"])
            ->where("id", $userId)
            ->first();

        $ph_number = preg_replace("/[^0-9]/", "", $request->phone);

        $user->email = $request->email;
        $user->phone = $ph_number;
        $user->name = $request->name;
        $user->save();

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

        $user->old_password = $user->password;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->noContent();
    }

    public function updateProfileInfo(Request $request){

        $request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "patronymic"=>"required",
            "sms_notification"=>"required",
            "email_notification"=>"required",
        ]);

        $userId = Auth::user()->id;

        $user = User::query()
            ->with(["profile", "company"])
            ->where("id", $userId)
            ->first();

        $user->sms_notification = $request->sms_notification;
        $user->email_notification = $request->email_notification;
        $user->save();

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


                $user->avatar = $url;
                $user->save();

            }

        }

        return response()->noContent();
    }


}
