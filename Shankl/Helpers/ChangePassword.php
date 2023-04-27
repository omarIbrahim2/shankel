<?php

namespace  Shankl\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class ChangePassword{

   
    public function changePass(Request $request , $guard){
       
        $validated = $request->validate($this->rules());

         
        $userModel = $this->getTheUserModel($guard);
          
        $AuthUser = $this->getAuthUser($userModel , $guard);

        if(! Hash::check($request->old_password , $AuthUser->password)){
                
            return back()->with('error' , "old password doesn't match");
        }

         $AuthUser->update(['password' => Hash::make($validated['password'])]);
            
        toastr("paswword changed successfully" , 'success');


    }


    private function getTheUserModel($guard){

        return Config::get("auth.custom." . $guard .".model");
    }


    private function getAuthUser($user , $guard){

        return $user::findOrFail($this->getGuard($guard)->id);
    }
    


         
   private function rules(){

      return [
        "old_password" => 'required',
        "password" => 'required|confirmed|min:6',
      ];

   }


    private function getGuard($guard){
        
        return Auth::guard($guard)->user();


    }
}