<?php

namespace Shankl\Entities;

class ParentEntity extends UserEntity{
    
    



    public function __construct($attributes){
        
          parent::__construct($attributes);

          $this->schema['gender'] = $attributes['gender'];
          
          $this->path = 'parents';
    }



   


}