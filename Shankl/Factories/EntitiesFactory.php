<?php

namespace Shankl\Factories;

use Shankl\Entities\AdminEntity;
use Shankl\Entities\ParentEntity;
use Shankl\Entities\SchoolEntity;
use Shankl\Entities\TeacherEntity;
use Shankl\Entities\SupplierEntity;

class EntitiesFactory{

    public static function createEntity($attributes , $entity){

        if($entity == "parent"){
            return new ParentEntity($attributes);
        }elseif($entity == "teacher"){
            return new TeacherEntity($attributes);
        }elseif($entity == "school"){
            return new SchoolEntity($attributes);
        }elseif($entity == "supplier"){
            return new SupplierEntity($attributes);
        }elseif($entity == "web"){
            return new AdminEntity($attributes);
        }
    }
}