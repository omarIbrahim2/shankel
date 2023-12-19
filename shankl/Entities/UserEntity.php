<?php

namespace Shankl\Entities;

use App\Traits\HandleUpload;
use Illuminate\Support\Facades\Hash;
use Shankl\Services\FileService;

 abstract class  UserEntity{
      
  protected $schema = array();
  protected $status = false;

  protected  $path;


  use HandleUpload;

   public function __construct($attributes)
   {

    if (isset($attributes['id'])) {
         $this->schema['id'] = $attributes['id'];
    }

    if (isset($attributes['name_en']) && $attributes['name_ar']) {
        
        $this->schema['name'] = json_encode([
            'en' => $attributes['name_en'],
            'ar' => $attributes['name_ar'],
       ]);
    }else{


        $this->schema['name'] = $attributes['name'];
    }
   
    if (isset($attributes['phone'])) {
        $this->schema['phone'] = $attributes['phone'];
    }
    
     $this->schema['email'] = $attributes['email'];
     if (isset($attributes['password'])) {
        $this->setPassword($attributes['password']);
     }
    
     $this->schema['area_id'] = $attributes['area_id'];
   }


  


  public function getAttributes(){
      return $this->schema;
  }

  public function getEmail(){

      return $this->schema['email'];
  }

  public function getPassword()
  {
      return $this->schema['password'];
  }

public function changeStatus(){

    if($this->status == true){
        $this->status = false;
    }else{
        $this->status = true;
    }

    $this->schema['status'] = $this->status;
}

public function setPassword($password){
    $hashedPassword = Hash::make($password);
    $this->schema['password'] = $hashedPassword;
}


public function setImage($ImageName){

     $this->schema['image'] = $ImageName;
}

public function UploadImage( FileService $fileService ,$request){

    $imagePath =  $this->handleUpload($request , $fileService , null , $this->path);

    $this->schema['image'] = $imagePath;
    
}

}