<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

trait HandleResponseSupplier{


    public function response($message = null , $route , $supplier , Request $request){

          if ($message == null) {
               
            Auth::guard('supplier')->login($supplier);
    
            $request->session()->regenerate();
             
        return redirect()->route($route);
             
          }

          if ($supplier) {
                 
            toastr($message , 'success');
         }


         return redirect()->route($route , "unactive");

    }
}