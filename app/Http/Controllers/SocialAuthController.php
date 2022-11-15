<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\DictionaryType;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    //

    public function vkAuth(Request $request)
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function vkCallback(Request $request)
    {

        try {
            $vkUser = Socialite::driver("vkontakte")->user();
        } catch (\Exception $e) {
            return redirect()->route("page.main");
        }


        $user = User::query()->where("email", $vkUser->getEmail())->first();

        if (!is_null($user)) {
            Auth::login($user, true);
            return redirect()->route("page.user-cabinet");
        }

        $userRole = UserRole::where('role_name', 'user')->first();

        $profile = Profile::create([
            'fname' => explode(" ", $vkUser->getName())[0] ?? '',
            'sname' => explode(" ", $vkUser->getName())[1] ?? '',
            'tname' => explode(" ", $vkUser->getName())[2] ?? '',
            'photo' => $vkUser->getAvatar(),
        ]);

        /*$user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();*/

        $dictType = Dictionary::query()->where("title", "Физическое лицо")->first();

        $user = User::query()->create([
            'name' => $vkUser->getName(),
            'email' => $vkUser->getEmail(),
            'phone' => $vkUser->getEmail(),
            'password' => bcrypt($vkUser->getEmail()),
            'role_id' => $userRole->id,
            'profile_id' => $profile->id,
            'user_law_status_id' => $dictType->id,
        ]);

        $user->save();


        /*
                if (!is_null($user->email))
                    Mail::to($user->email)
                        ->send(new RegistrationMail(
                            $user
                        ));*/

        Auth::login($user, true);

        /*     $user->sendEmailVerificationNotification();

             event(new NotificationEvent(
                 "Users",
                 "Success registration for user  " . $user->id,
                 NotificationType::Info,
                 $user->id));*/

        return redirect()->route("page.user-cabinet");

    }

    public function registration(Request $request)
    {
        $request->validate([
            "name" => "required",
            "phone" => "required",
            "law_status" => "required",
            "password" => "required"
        ]);

        $user = User::query()
            ->with(["role"])
            ->where("phone", $request->phone)->first();

        if (!is_null($user)) {
            return response()->json([
                "message" => "Error"
            ], 400);

        }
        ;

        $role = $request->law_status == 0 ? "user" : "guide";

        $userRole = UserRole::where('role_name', $role)->first();

        $profile = Profile::create([
            'fname' => explode(" ", $request->name)[0] ?? '',
            'sname' => explode(" ", $request->name)[1] ?? '',
            'tname' => explode(" ", $request->name)[2] ?? '',
            'photo' => '/images/no-avatar.png',
        ]);

        $law_statuses = ["Физическое лицо","Юридическое лицо", "Самозанятый"];

        $dictType = Dictionary::query()->where("title", $law_statuses[$request->law_status])->first();

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->phone,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => $userRole->id,
            'profile_id' => $profile->id,
            'user_law_status_id' => $dictType->id,
        ]);

        $user->save();


        /*
                if (!is_null($user->email))
                    Mail::to($user->email)
                        ->send(new RegistrationMail(
                            $user
                        ));*/

        Auth::login($user, true);

        return response()->json([
            "role" => $user->role->role_name,
            "message" => "Success"
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $user = User::query()
            ->with(["role"])
            ->where("phone", $request->username)->first();

        if (!is_null($user)) {
            Auth::login($user, true);
            return response()->json([
                "role" => $user->role->role_name,
                "message" => "Success"
            ], 200);
        }

        return response()->json([
            "message" => "Error"
        ], 400);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->redirectToRoute("login");
    }
}
