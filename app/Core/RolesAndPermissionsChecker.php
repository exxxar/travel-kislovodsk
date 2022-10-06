<?php

namespace App\Core;

use Illuminate\Support\Facades\Auth;

class RolesAndPermissionsChecker
{
    public static function isAdmin()
    {
        return Auth::user()->role_id === RolesEnum::Admin;
    }

    public static function isUser()
    {
        return Auth::user()->role_id === RolesEnum::User;
    }
}
