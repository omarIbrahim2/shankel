<?php

namespace Shankl\Repositories;

use App\Models\Parentt;
use Illuminate\Support\Facades\Auth;
use Shankl\Interfaces\UserReboInterface;

class ParentRepository implements UserReboInterface{

   public function getActiveUsers($pages){

      return Parentt::where('status' , true)->paginate($pages);
   }

   public function getUnActiveUsers($pages){

      return Parentt::where('status' , false)->paginate($pages);
   }
   
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

    public function ParentChilds(){
         
       $parentUser =  Auth::guard('parent')->user();
        
       return $parentUser->children;
    }

}