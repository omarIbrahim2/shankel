<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildRequired
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
        $authParent = Auth::guard("parent")->user();
        
        if (count($authParent->children) == 0) {
            toastr("you must add atleast one child to access your home page" , "warning");
            return redirect()->route("add-child" , $authParent->id);
 
         }
        return $next($request);   
    }
}
