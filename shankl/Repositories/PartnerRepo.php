<?php

namespace Shankl\Repositories;

use App\Models\Partner;
use Shankl\Interfaces\PartnerRepoInterface;

class PartnerRepo implements PartnerRepoInterface{


  
    public function get(...$args){

         return Partner::select(...$args)->get();
    }


    public function create($data){

           return Partner::create($data);
    }


    public function update($data){
        
        $partner = Partner::findOrFail($data['id']);

        return $partner->update($data);

    }


    public function delete($partnerId , $fileService){
          
         
        $partner = Partner::findOrFail($partnerId);
        
        $deletedImage = substr($partner->image, 8);

         $fileService->DeleteFile($deletedImage);
         return  $partner->delete();


    }
}