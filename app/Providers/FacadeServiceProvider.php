<?php

namespace App\Providers;

use App\Core\RolesAndPermissionsChecker;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('roles.and.permissions.checker', fn () => new RolesAndPermissionsChecker());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
