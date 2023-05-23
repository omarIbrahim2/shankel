<?php
namespace Shankl\Repositories;

use App\Models\Social;

class SocialsRepository{

    public function getSocials(){

        return Social::select('facebook' , 'email' , 'phone' , 'twitter' , 'Linkedin' , 'instagram' , 'address' , 'id')->first();
    }

    public function create($data){
        
        return Social::create($data);
    }

    public function getSocial($socialId){
         return Social::findOrFail($socialId);
    }

    public function delete($socialId){
         
       $social =  $this->getSocial($socialId);

       return $social->delete();

    }

    public function update($data , $socialId){
        $social =  $this->getSocial($socialId);

        return $social->update($data);

    }
}