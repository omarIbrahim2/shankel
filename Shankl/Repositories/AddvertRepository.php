<?php
namespace Shankl\Repositories;

use App\Models\Addvert;
use Shankl\Interfaces\AddvertRepoInterface;

class AddvertRepository implements AddvertRepoInterface{

   public function getAddverts($pages){
       
       return Addvert::select('id' , 'title' , 'desc' ,'image')->paginate($pages);

   }

   public function getAddvertsWeb($userId = null , $guard){
       
      if ($userId == null && $guard == 'guest') {
         
         return null;
      }

      if ($guard == 'supplier') {
         return Addvert::with('addverts'  , function($query) use($userId){

            $query->where('id'  , $userId);
         })->get();
      }else if($guard == 'school'){
         return Addvert::with('addverts' , function($query) use($userId){

            $query->where('id'  , $userId);
         })->get();
              
      }elseif ($guard == 'teacher') {
            

         return Addvert::with('addverts' , function($query) use($userId){

            $query->where('id'  , $userId);
         })->get();
      }
     

   }

   public function addAddvert($data)
   {
      return Addvert::create($data);
   }

   public function find($addvertId){

     return Addvert::findOrFail($addvertId);

   }

   public function updateAddvert($data)
   {
      $addvert = $this->find($data['id']);

     return $addvert->update($data);
   }


   public function deleteAddvert($addvertId)
   {
      $addvert =$this->find($addvertId);
        return $addvert->delete();
   }
}