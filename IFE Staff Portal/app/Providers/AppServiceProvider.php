<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Observers\UserObserver;
use App\Observers\RoleObserver;
use Middleware\AuthGates;

class AppServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    
    public function boot()
    {
        User::observe(UserObserver::class);
        Role::observe(RoleObserver::class);

    }
}
