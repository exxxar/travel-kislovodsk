<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class RolesAndPermissionsCheckerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'roles.and.permissions.checker';
    }
}
