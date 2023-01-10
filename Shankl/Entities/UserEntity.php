<?php

namespace Shankl\Entities;

use Illuminate\Support\Facades\Hash;

 abstract class  UserEntity{
      
  protected $attributes;
  protected $status = false;

   public function __construct($attributes)
   {
     $this->attributes = $attributes;
   }


  public function getAttributes(){
      return $this->attributes;
  }

  public function getEmail(){

      return $this->attributes['email'];
  }

  public function getPassword()
  {
      return $this->attributes['password'];
  }

  public function getName(){
       
    return $this->attributes['name'];

}

public function getArea(){

    return $this->attributes['area'];
}



public function changeStatus(){

    if($this->status == true){
        $this->status = false;
    }else{
        $this->status = true;
    }

    $this->attributes['status'] = $this->status;
}

public function setPassword($password){
    $hashedPassword = Hash::make($password);
    $this->attributes['password'] = $hashedPassword;
}

public function setImage($imagePath){

    $this->attributes['image'] = $imagePath;
}

}