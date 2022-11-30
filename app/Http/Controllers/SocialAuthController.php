<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\DictionaryType;
use App\Models\Profile;
use App\Models\User;
use App\Models\CustomUserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use TCG\Voyager\Models\Role;

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

        $user = User::query()
            ->where("phone", $vkUser->getEmail())
            ->orWhere("email", $vkUser->getEmail())
            ->first();

        if (!is_null($user)) {
            Auth::login($user, true);
            return redirect()->route("page.user-cabinet");
        }


        try {
            $username = $vkUser->getNickname() ?? explode("@", $vkUser->getEmail())[0];
            $user = User::createUser([
                'username' => $username,
                'first_name' => explode(" ", $vkUser->getName())[0] ?? '',
                'last_name' => explode(" ", $vkUser->getName())[1] ?? '',
                'patronymic' => explode(" ", $vkUser->getName())[2] ?? '',
                'phone' => $vkUser->getEmail(),
                'email' => $vkUser->getEmail(),
                'password' => $vkUser->getEmail(),
                'law_status' => 0,
                'photo' => $vkUser->getAvatar(),
            ]);
        } catch (\Exception $e) {

            return redirect()->route("page.login");
        }

        return redirect()->route("page.user-cabinet");

    }

    public function registration(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'patronymic' => 'required|max:255',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'law_status' => 'required',
            'photo' => 'required',
            'company.title' => 'max:255',
            'company.logo' => 'max:255',
            'company.description' => 'max:255',
            'company.inn' => 'max:50',
            'company.ogrn' => 'max:50',
            'company.law_address' => 'max:255',
        ]);

        try {
            $user = User::createUser([
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'patronymic' => $request->patronymic,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => $request->password,
                'law_status' => $request->law_status,
                'photo' => $request->photo,
                'company' => (object)[
                    "title" => $request->company->title ?? null,
                    "logo" => $request->company->logo ?? null,
                    "description" => $request->company->description ?? null,
                    "inn" => $request->company->inn ?? null,
                    "ogrn" => $request->company->ogrn ?? null,
                    "law_address" => $request->company->law_address ?? null,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }

        return response()->json([
            "message" => "Success",
            "role" => $user->role->name
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        try {
            $user = User::loginUser([
                "phone" => $request->username,
                "password" => $request->password,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }

        return response()->json([
            "message" => "Success",
            "role" => $user->role->name
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->redirectToRoute("login");
    }
}
