<?php 
namespace Shankl\Entities;

class SupplierEntity extends UserEntity{
    

    public function __construct($attributes){
          
        parent::__construct($attributes);

        $this->schema['orgName'] = json_encode([
            'en' => $attributes['orgName_en'],
            'ar' => $attributes['orgName_ar'],
        ]);

        $this->schema['type'] = json_encode([
            'en' => $attributes['orgName_en'],
            'ar' => $attributes['orgName_ar'],
        ]);

        $this->path= 'suppliers';
    }
}