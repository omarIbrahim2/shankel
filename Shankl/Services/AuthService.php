<?php


namespace Shankl\Services;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Shankl\Entities\UserEntity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Shankl\Interfaces\UserReboInterface;
use Illuminate\Validation\ValidationException;

class AuthService{

   
    public function RegisterUser(UserReboInterface $userRebo , UserEntity $user){
         
        $createdUser =  $userRebo->create($user->getAttributes());


        return $createdUser;


    }


    public function logoutUser(Request $request ,  $guard){

        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        

    }


    public function LoginUser($guard , Request $request){
        $this->ensureIsNotRateLimited($request);

       // dd(Auth::guard($guard));
        // dd(Auth::guard("teacher")->attempt(['email'=> $request->email , 'password' => $request->password , 'status' => 1]));
        if (! Auth::guard($guard)->attempt(['email'=> $request->email , 'password' => $request->password , 'status' => true])) {
                 
            RateLimiter::hit($this->throttleKey($request->email , $request->ip));
            
             throw ValidationException::withMessages([
                  "email" => trans('auth.failed'),
             ]);
  
        }


        RateLimiter::clear($this->throttleKey($request->email , $request->ip));


    }



    public function throttleKey($email , $ip){

        return Str::lower($email). '|' . $ip; 
    }


    public function ensureIsNotRateLimited(Request $request){

        if ( ! RateLimiter::tooManyAttempts($this->throttleKey($request->email , $request->ip) , 5)) {
            
            return;
        }

        event(new Lockout($request));

        $seconds = RateLimiter::availableIn($this->throttleKey($request->email , $request->ip));

        throw ValidationException::withMessages([
            "email" => trans('auth.throttle' , [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }


}