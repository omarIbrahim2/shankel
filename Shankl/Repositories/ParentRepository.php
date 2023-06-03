<?php

namespace Shankl\Repositories;

use App\Models\Card;
use App\Models\Parentt;
use Illuminate\Support\Facades\Auth;
use Shankl\Factories\AuthUserFactory;
use Shankl\Interfaces\CardInterface;
use Shankl\Interfaces\UserReboInterface;

class ParentRepository implements UserReboInterface , CardInterface{

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

   public function addToCard($parent , $serviceId){

         $parentCard =   $parent->card;

         

         if ($parentCard == null) {
               
           $createdCard =   $parent->card()->create([
                  "user_id" => $parent->id,
              ]);
              dd($createdCard);
            return $createdCard->attach([$serviceId]);  
         }else{
            
           return  $parentCard->services()->attach([$serviceId]);
         }

    }

    public function getCardWithServices()
    {
         $AuthUser = AuthUserFactory::getAuthUser();

         $card = $AuthUser->card;


         return Card::with(['services'])->where('id' , $card->id)->get();
    }

    public function ParentChilds(){
         
       $parentUserId =  Auth::guard('parent')->user()->id;

        $AuthParent = Parentt::with('children')->findOrFail($parentUserId);
        
       return $AuthParent;
    }

   

}