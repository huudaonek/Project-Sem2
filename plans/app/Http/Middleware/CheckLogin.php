<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && ($request->routeIs('login.form') || $request->routeIs('register.form'))) {
            return redirect('/');
        }
        return $next($request);
    }
}
