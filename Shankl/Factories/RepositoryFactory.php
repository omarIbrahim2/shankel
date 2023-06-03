<?php

namespace Shankl\Factories;

use Shankl\Repositories\ParentRepository;
use Shankl\Repositories\SchoolRepository;
use Shankl\Repositories\TeacherRepository;

class RepositoryFactory{
 

    public static function getUserRebo($guard){
       
        if ($guard == 'parent') {
             
            return new ParentRepository();
        }elseif($guard == 'school'){

            return new SchoolRepository();
        }elseif($guard == 'teacher'){
            
             return new TeacherRepository();
        }

    }


}