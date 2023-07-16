<?php 
namespace Shankl\Entities;

class SchoolEntity extends UserEntity{
    
   
    public function __construct($attributes){
           

        parent::__construct($attributes);
        
        $this->schema['edu_systems_id'] = $attributes['edu_systems_id'];
        $this->schema['establish_date'] = $attributes['establish_date'];
        $this->schema['type'] = $attributes['type'];
        $this->schema['free_seats'] = $attributes['free_seats'];
        $this->path = 'schools';



    }
    
}