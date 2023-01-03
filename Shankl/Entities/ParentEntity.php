<?php

namespace Shankl\Entities;

class ParentEntity extends UserEntity{

    private $status = false;

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

        $this->attributes['password'] = $password;
    }
}