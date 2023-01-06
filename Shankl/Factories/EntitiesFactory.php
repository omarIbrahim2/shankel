<?php

namespace Shankl\Factories;

use Shankl\Entities\ParentEntity;

class EntitiesFactory{



    static function createEntity($attributes , $entity){

        if($entity == "parent"){

            return new ParentEntity($attributes);
        }
    }
}