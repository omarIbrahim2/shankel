<?php 
namespace Shankl\Entities;

class TeacherEntity extends UserEntity{
    

    public function __construct($attributes){
        
         parent::__construct($attributes);

         $this->schema['field'] = json_encode([
            'en' => $attributes['field_en'],
            'ar' => $attributes['field_ar'],
         ]);

         $this->path = 'teachers';
    }
}