<?php


namespace Shankl\Services;

use Shankl\Entities\UserEntity;
use Shankl\Interfaces\UserReboInterface;

class AuthService{

   
    public function RegisterUser(UserReboInterface $userRebo , UserEntity $user){
         
        $createdUser =  $userRebo->create($user->getAttributes());


        return $createdUser;


    }


}