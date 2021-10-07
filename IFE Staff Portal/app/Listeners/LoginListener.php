<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginListener
{

    public function __construct()
    {
        //
    }


    public function handle($event)
    {
        $event->user->update([
            'last_login' => now(),
            'last_login_ip' => request()->getClientIp(),
        ]);
    }
}
