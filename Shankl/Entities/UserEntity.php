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

}