<?php

namespace App\Http\Middleware;

use Closure;
use App\AppSettings\AppSetting;

class RegMustBeOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if not an admin and registration is not open, redirect to home
        if (!$request->user()->isAdmin and !AppSetting::regOpen()) {
            return redirect('/home');
        } else {
            return $next($request);
        }
    }
}
