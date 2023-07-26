<?php

namespace Shankl\Repositories;

use App\Models\Card;
use App\Models\Parentt;
use App\Models\School;
use App\Models\SchoolRegOrder;
use Illuminate\Support\Facades\Auth;
use Shankl\Factories\AuthUserFactory;
use Shankl\Interfaces\CardInterface;
use Shankl\Interfaces\UserReboInterface;

class ParentRepository extends AbstractUserRepo implements UserReboInterface, CardInterface
{

   public function getActiveUsers($pages)
   {

      return Parentt::where('status', true)->orderBy('created_at' , 'DESC')->paginate($pages);
   }

   public function getUnActiveUsers($pages)
   {

      return Parentt::where('status', false)->orderBy('created_at' , 'DESC')->paginate($pages);
   }

   public function create($data)
   {

      $parent =  Parentt::create($data);

      return $parent;
   }

   public function find($parentid)
   {


      $currentParent = Parentt::findOrFail($parentid);

      return $currentParent;
   }

   public function update($data)
   {

      $parent =  $this->find($data['id']);

      return $parent->update($data);
   }


   public function ParentChilds()
   {

      $parentUserId =  Auth::guard('parent')->user()->id;

      $AuthParent = Parentt::select('name' , 'image' , 'id')->with('children')->findOrFail($parentUserId);

      return $AuthParent;
   }

   public function getAreaSchools($pages){
      $parentAreaId=  Auth::guard('parent')->user()->area_id;
        
     
      $areaSchools = School::select('id','image','name','area_id')->where('area_id' , $parentAreaId)->paginate($pages);
      return $areaSchools;
   }

   public function getReservedSchools($pages){
      $childrenIds = $this->ParentChilds()->children->pluck('id')->toArray();
      $reservedSchoolsIDs = SchoolRegOrder::select('school_id')->whereIn('child_id' ,$childrenIds )->pluck('school_id')->toArray();
      $reservedSchools =  School::select('id','image','name','area_id')->whereIn('id' , $reservedSchoolsIDs)->paginate($pages);
      return $reservedSchools;
   }
}
