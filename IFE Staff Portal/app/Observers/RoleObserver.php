<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RoleCreationNotification;
use App\Notifications\RoleDeletionNotification;
use App\Notifications\RoleModificationNotification;

class RoleObserver
{

    public function created(Role $role)
    {
        $users = User::whereHas('roles', function ($query) 
        {
            $query->where('id', 1);
        })->whereHas('settings', function ($settings)
        {
            $settings->where('user_notifications', true);
        })
        ->get();

        foreach($users as $user)
        {
                $user->notify(new RoleCreationNotification($role));
        }
    }

    public function updated(Role $role)
    {
        $users = User::whereHas('roles', function ($query) 
        {
            $query->where('id', 1);
        })->whereHas('settings', function ($settings)
        {
            $settings->where('user_notifications', true);
        })
        ->get();


        foreach($users as $user)
        {
            $user->notify(new RoleModificationNotification($role));
        }
    }

    public function deleted(Role $role)
    {
        $users = User::whereHas('roles', function ($query) 
        {
            $query->where('id', 1);
        })
        ->whereHas('settings', function ($settings)
        {
            $settings->where('user_notifications', true);
        })
        ->get();

        foreach($users as $user)
        {
            $user->notify(new RoleDeletionNotification($role));
        }
    }


    public function restored(Role $role)
    {
        //
    }


    public function forceDeleted(Role $role)
    {
        //
    }
}
