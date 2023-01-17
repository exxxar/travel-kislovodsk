<?php

namespace App\Http\Controllers;

use App\Events\ActionNotificationEvent;
use App\Exceptions\SmsCodeValidationException;
use App\Facades\PaymentServiceFacade;
use App\Facades\SmsServiceFacade;
use App\Mail\NotifyMail;
use App\Models\Dictionary;
use App\Models\DictionaryType;
use App\Models\Profile;
use App\Models\User;
use App\Models\CustomUserRole;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

            $user->email_verified_at = Carbon::now();
            $user->phone_verified_at = Carbon::now();
            $user->save();

            Auth::login($user, true);

        } catch (\Exception $e) {
            return redirect()->route("login");
        }

        return redirect()->route("page.user-cabinet");

    }

    public function preRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'patronymic' => 'nullable|max:255',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            "password" => 'min:6|required_with:confirm_password|same:confirm_password',
            "confirm_password" => "required",
            'law_status' => 'required',
            'photo' => 'nullable',
            'company' => 'nullable',
            'company.title' => 'nullable|max:255',
            'company.logo' => 'nullable|max:255',
            'company.description' => 'nullable|max:255',
            'company.inn' => 'nullable|max:50',
            'company.ogrn' => 'nullable|max:50',
            'company.law_address' => 'nullable|max:255',
        ]);

        try {
            $company = (object)$request->company;
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
                    "title" => $company->title ?? null,
                    "logo" => $company->logo ?? null,
                    "description" => $company->description ?? null,
                    "inn" => $company->inn ?? null,
                    "ogrn" => $company->ogrn ?? null,
                    "law_address" => $company->law_address ?? null,
                ],
            ]);

            $user->sms_code = SmsServiceFacade::actions()->sendCall("+" . $user->phone);
            $user->save();


        } catch (\Exception $e) {
            return response()->json([
                "errors" => [
                    "message" => [$e->getMessage()]
                ]
            ], 400);
        }

        if (!is_null($user->sms_code)) {
            return response()->json([
                "message" => "Need sms",
                "sms" => true
            ]);
        } else {
            Auth::login($user, true);

            return response()->json([
                "message" => "Success",
                "role" => $user->role->name
            ]);
        }


    }

    public function registration(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'code' => 'required|numeric',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'patronymic' => 'nullable|max:255',
            'phone' => 'required',
            'email' => 'required',
            "password" => 'min:6|required_with:confirm_password|same:confirm_password',
            "confirm_password" => "required",
            'law_status' => 'required',
            'photo' => 'nullable',
            'company' => 'nullable',
            'company.title' => 'nullable|max:255',
            'company.logo' => 'nullable|max:255',
            'company.description' => 'nullable|max:255',
            'company.inn' => 'nullable|max:50',
            'company.ogrn' => 'nullable|max:50',
            'company.law_address' => 'nullable|max:255',
        ]);

        $ph_number = preg_replace("/[^0-9]/", "", $request->phone);


        $user = User::query()->where("phone", $ph_number)
            ->first();


        if (is_null($user))
            return response()->json([
                "errors" => [
                    "message" => ["Пользователь не найден"]
                ]
            ], 404);

        if ($user->sms_code !== $request->code)
            return response()->json([
                "errors" => [
                    "message" => ["Неверный проверочный код"]
                ]
            ], 404);

        $user->sms_code = null;
        $user->phone_verified_at = Carbon::now();
        $user->save();

        Auth::login($user, true);

        return response()->json([
            "message" => "Success",
            "role" => $user->role->name
        ]);
    }

    public function loginWithCode(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
            "code" => "required|numeric"
        ]);

        try {
            $user = User::loginUserWithCode([
                "phone" => $request->username,
                "password" => $request->password,
                "code" => $request->code
            ]);
        } catch (AuthenticationException $e) {
            return response()->json([
                "errors" => [
                    "message" => [$e->getMessage()]
                ]
            ], 400);
        } catch (SmsCodeValidationException $e) {
            return response()->json([
                "message" => "Неверно введен подтверждающий код",
                "sms" => true
            ]);
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
        } catch (AuthenticationException $e) {
            return response()->json([
                "errors" => [
                    "message" => [$e->getMessage()]
                ]
            ], 400);
        } catch (SmsCodeValidationException $e) {
            return response()->json([
                "message" => "Ваш аккаунт не верифицирован! Вам отправлен звонок с кодом",
                "sms" => true
            ]);
        }

        return response()->json([
            "message" => "Success",
            "role" => $user->role->name
        ]);
    }

    public function logout(Request $request)
    {

        Auth::logout();

        event(new ActionNotificationEvent("logout"));

        return response()->redirectToRoute("login");
    }

    public function preRecovery(Request $request)
    {
        $request->validate([
            "phone" => "required"
        ]);


        if (!strpos($request->phone, "@"))
            $ph_number = preg_replace("/[^0-9]/", "", $request->phone);

        $user = User::query()
            ->where("phone", $ph_number ?? $request->phone)
            ->orWhere("email", $request->phone)
            ->first();

        if (is_null($user))
            return response()->json([
                "errors" => [
                    "message" => ["Пользователь с таким номером не найден!"]
                ]
            ], 400);

        $code = SmsServiceFacade::actions()->sendCall("+" . $user->phone);

        if (is_null($code)) {
            $user->sms_code = random_int(1000, 9999);
            $user->save();

            Mail::to($user->email)
                ->send(new NotifyMail("Ваш код для смены пароля: $user->sms_code"));

            return response()->json([
                "message" => "К сожалению, sms-сервис сейчас не доступен, мы отправили код восстановления на вашу электронную почту!",
                "sms" => true
            ]);
        } else {
            $user->sms_code = $code;
            $user->save();

            return response()->json([
                "message" => "На ваш номер телефона отправлен входящий звонок! Последние 4 цифры номера - ваш код.",
                "sms" => true
            ]);
        }


    }

    public function preRecoveryCode(Request $request) {
        $request->validate([
            "phone" => "required",
            "code" => "required|numeric",
        ]);

        if (!strpos($request->phone, "@"))
            $ph_number = preg_replace("/[^0-9]/", "", $request->phone);

        $user = User::query()
            ->where("phone", $ph_number ?? $request->phone)
            ->orWhere("email", $request->phone)
            ->first();

        if (is_null($user))
            return response()->json([
                "errors" => [
                    "message" => ["Пользователь с таким номером не найден!"]
                ]
            ], 400);


        if ($user->sms_code!==$request->code){
            return response()->json([
                "errors" => [
                    "message" => ["Неверный код!"]
                ]
            ], 400);
        }

        return response()->json([
            "message" => "Код успешно принят, введите новый пароль!",
            "sms" => true
        ]);
    }

    public function recovery(Request $request)
    {
        $request->validate([
            "phone" => "required",
            "code" => "required|numeric",
            "password" => 'min:6|required_with:confirm_password|same:confirm_password',
            "confirm_password" => "required",
        ]);

        if (!strpos($request->phone, "@"))
            $ph_number = preg_replace("/[^0-9]/", "", $request->phone);

        $user = User::query()
            ->where("phone", $ph_number ?? $request->phone)
            ->orWhere("email", $request->phone)
            ->first();

        if (is_null($user))
            return response()->json([
                "errors" => [
                    "message" => ["Пользователь с таким номером не найден!"]
                ]
            ], 400);


        if ($user->sms_code!==$request->code){
            return response()->json([
                "errors" => [
                    "message" => ["Неверный код!"]
                ]
            ], 400);
        }

        $user->sms_code = null;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            "message" => "Ваш пароль успешно иземенен!",
            "sms"=>true
        ]);

    }
}
