<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ( Auth::guard("teacher")->check()) {
             
            return $next($request);
 
         }elseif( Auth::guard("parent")->check()) {
             
            return $next($request);
 
         }elseif( Auth::guard("school")->check()) {
             
            return $next($request);
 
         }elseif( Auth::guard("supplier")->check()) {
             
            return $next($request);
 
         }
        return redirect()->route("home");
    }
}
