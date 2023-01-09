<?php

namespace Shankl\Helpers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Config;

class ResetPasswords{
       
    private $guard;
    

     public function reset(Request $request , $broker){
        
        $request->validate($this->rules(), $this->validationErrorMessages());


        $response = $this->getBroker($broker)->reset($this->credentials($request), function($user , $password){

              $this->resetPassword($user , $password , $this->getGuard());

        });


        return $response ;


     }  



    public function validationErrorMessages()
    {
        return [];
    }

    public function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }


    public function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }
    

    function resetPassword($user, $password , $guard)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        
    }


    public function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
    }

     public function getUserRedirect($broker){
        
         return Config::get("auth.passwords.".$broker. ".url" );

     }

    public function getBroker($broker){
        
        return Password::broker($broker);

    }
    public function setGuard($guard){

        $this->guard = $guard;
    }


    public function getGuard(){
         
        return $this->guard;

    }

}