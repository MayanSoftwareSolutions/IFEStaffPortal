<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Check if the user account is active or deactivated
        if (auth()->user()->active == true ) {
            return $next($request);
            }
            $request->session()->flush();
            return abort('403');

        return $next($request);
    }
}
