<?php

namespace Shankl\Entities;


class ChildEntity {
    
    private $attr;
   public function __construct($attr)
   {
    $this->attr = $attr;
    
   }

   public function getAttributes(){

      return $this->attr;
   }
}