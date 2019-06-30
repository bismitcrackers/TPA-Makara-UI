<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\WebHelper;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $urlRoleMap = WebHelper::getUrlForRole($request->user()->roles()->first()->name);
            return redirect('/' . $urlRoleMap . '/home');
        }

        return $next($request);
    }
}
