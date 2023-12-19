<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
       
        
       
        if (Auth::guard('web')->check()) {
            return redirect()->route(RouteServiceProvider::ADMIN);
       }else if (Auth::guard('parent')->check()) {
            return redirect()->route(RouteServiceProvider::PARENT);
       }else if (Auth::guard('teacher')->check()) {
            return redirect()->route(RouteServiceProvider::TEACHER);
        }else if (Auth::guard('school')->check()) {
            return redirect()->route(RouteServiceProvider::SCHOOL);
        }
        
        return $next($request);

    }
}
