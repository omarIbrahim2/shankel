<?php

namespace Shankl\Entities;



 abstract class  UserEntity{
      
  protected $attributes;

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

}