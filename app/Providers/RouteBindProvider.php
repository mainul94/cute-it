<?php

namespace App\Providers;

use App\User;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class RouteBindProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->model('role', Role::class);
        $router->model('permission', Permission::class);
        $router->model('user', User::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
