<?php

namespace Shankl\Services;

use App\Notifications\ConfirmUserNotify;
use Illuminate\Support\Facades\Notification;

abstract class Service{

    public function ActivateUserAccount($user , $loginRoute){
       

        $action = $user->update(['status' => true]);

         $data = [
            "userName" => $user->name,
             "route" => $loginRoute,

         ];
          

        if($action == true){
            Notification::send($user , new ConfirmUserNotify($data));
        }else{

            toastr("error in Activating" , "error" );
        }
         

    }



    public function DeactivateUserAcount($user){

        $action =   $user->update(['status' => false]);

         if($action == true){
             toastr("User deactivated .." , "info" , "deactivation");
         }else{

            toastr("error in deactivating" , "error" );
         }

    }
    
}