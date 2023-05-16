<?php

namespace Shankl\Factories;

use Illuminate\Support\Facades\Auth;


class AuthUserFactory{
 
  private static $guards;
  
 
 public static function getAuthUserId(){
   
   self::$guards = config('auth.guards');
      $provider = "";
      $userId = 0;
     foreach(self::$guards as $guard=> $vals){
        
           if(Auth::guard($guard)->check()){
              
             $provider = $vals['provider'];

             $userId = Auth::guard($guard)->user()->id; 
              
           }
          
         
     }
       
      if ($provider == null && $userId == null) {
        return null;
      }

         $model = config("auth.providers.". $provider)['model'] ;

         $user = $model::findOrFail($userId);

         if ($user) {
            return $user->id;
         }
 }

 public static function geGuard(){

  self::$guards = config('auth.guards');
 foreach(self::$guards as $guard=> $vals){
    
       if(Auth::guard($guard)->check()){
          
              return $guard; 
          
       }
      
     
     }

     return 'guest';
 }

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
   
  if ($provider == null && $userId == null) {
    return null;
  }

     $model = config("auth.providers.". $provider)['model'] ;

     $user = $model::findOrFail($userId);

     if ($user) {
        return $user;
     }


 }

}