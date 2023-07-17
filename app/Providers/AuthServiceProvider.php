<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\comment;
use App\Models\Service;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Shankl\Factories\AuthUserFactory;
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
            }elseif(Auth::guard('supplier')->check() == true){
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
            }elseif(Auth::guard('supplier')->check() == true){
               return false;
            }

            return true;
        });
        Gate::define('superAdminProfile' , function(User $user){
           if ($user->role_id == 1) {
               
               return true;
           }

           return false;
        });

        Gate::define('delete-comment' , function($user , comment $comment , string $type){
             
            if ($type == "App\Models\User") {
            
                 return true;
            }

              if ($user->id == $comment->commentable_id && $type == $comment->commentable_type){
                    
                return true;
              }
        
              return false;

        });


        Gate::define("update-comment" , function($user , comment $comment , string $type){


            if ($user->id == $comment->commentable_id && $type == $comment->commentable_type){
                    
                return true;
              }

             return false; 
        });


        Gate::define('update-service' , function($user , Service $service){
            if (AuthUserFactory::geGuard() == 'web') {
                 return true;
            }
            if ($user->id == $service->supplier_id) {
                return true;
            }

            return false;
        });


        Gate::define('delete-service' , function($user , Service $service){
               
            if (AuthUserFactory::geGuard() == 'web') {
                return true;
           }
           if ($user->id == $service->supplier_id) {
               return true;
           }

           return false;

        });


       


     
       
        
    }
}
