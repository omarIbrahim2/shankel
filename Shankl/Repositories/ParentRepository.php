<?php

namespace Shankl\Repositories;

use App\Models\Parentt;
use Shankl\Interfaces\UserReboInterface;

class ParentRepository implements UserReboInterface{

   
     public function create($data)
    {
         
       $parent =  Parentt::create($data);

       return $parent;
    }

    public function find($parentid){


      $currentParent = Parentt::findOrFail($parentid);

      return $currentParent;
    }

    public function update($data){

        $parent =  $this->find($data['id']);

       return $parent->update($data);

    }

}