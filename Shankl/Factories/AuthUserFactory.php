<?php

namespace Shankl\Factories;

use Illuminate\Support\Facades\Auth;


class AuthUserFactory{
 
  private static $guards;
  
 
 public static function getAuthUser(){
   
   self::$guards = config('auth.guards');
      $provider = "";
      $userId = 0;
     foreach(self::$guards as $guard=> $vals){
        
           if(Auth::guard($guard)->check()){
              
             $provider = $vals['provider'];

             $userId = Auth::guard($guard)->user()->id; 
              
           }
          
         
     }

         $model = config("auth.providers.". $provider)['model'] ;

         $user = $model::findOrFail($userId);

         if ($user) {
            return $user;
         }

         return null;


 }

}