<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    private const GUARD_USER = 'user';
    private const GUARD_MEMBER = 'member';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next,  $guard = null)
    {
        if (Auth::guard(self::GUARD_USER)->check() && $request->routeIs('user.*')) {
            return redirect(RouteServiceProvider::HOME);
        }
        if (Auth::guard(self::GUARD_MEMBER)->check() && $request->routeIs('member.*')) {
            return redirect(RouteServiceProvider::MEMBER_HOME);
        }       

        return $next($request);
    }
}
