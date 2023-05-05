<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Blade::if('custom_auth' , function (){
            if (Auth::guard('web')->check() == true) {
                return true;
            }elseif(Auth::guard('parent')->check() == true){
                return true;
            }elseif(Auth::guard('school')->check() == true){
                return true;
            }elseif(Auth::guard('teacher')->check() == true){
                return true;
            }

            return false;
        });
         
        Blade::if('custom_guest' , function (){
            if (Auth::guard('web')->check() == true) {
                return false;
            }elseif(Auth::guard('parent')->check() == true){
                return false;
            }elseif(Auth::guard('school')->check() == true){
                return false;
            }elseif(Auth::guard('teacher')->check() == true){
                return false;
            }

            return true;
        });
       
        
    }
}
