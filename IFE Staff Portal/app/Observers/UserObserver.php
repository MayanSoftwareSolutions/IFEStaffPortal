<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserSettings;
use App\Notifications\UserCreationNotification;
use App\Notifications\UserUpdateNotification;
use App\Notifications\UserDeletionNotification;

class UserObserver
{
    
    public function created(User $user)
    {
        $user->notify(new UserCreationNotification($user));
    }

    
    public function updated(User $user)
    {
        if($user->isDirty(['last_login', 'last_login_ip']))
        {
            return
            [
                'last_login' == false,
                'last_login_ip' == false
            ];
        }

        $user->notify(new UserUpdateNotification($user));

    }

    
    public function deleted(User $user)
    {
        $user->notify(new UserDeletionNotification($user));
        
        $useradmins = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })
        ->whereHas('settings', function ($settings)
        {
            $settings->where('user_notifications', true);
        })
        ->get();

        foreach($useradmins as $useradmin)
        {
            $useradmin->notify(new UserDeletionNotification($user));
        }
    }

    
    public function restored(User $user)
    {
        //
    }

    
    public function forceDeleted(User $user)
    {
        //
    }
}
