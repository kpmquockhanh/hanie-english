<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ActiveUserMiddleware
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
        if (Auth::guard('user')->check() && !Auth::guard('user')->user()->status) {
            Auth::guard('user')->logout();
            return redirect(route('user.login'))->withErrors(['User is Deactivated']);
        }
        return $next($request);
    }
}
