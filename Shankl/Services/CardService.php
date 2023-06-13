<?php


namespace Shankl\Services;

use Shankl\Interfaces\CardInterface;


class CardService{


public function AddToCard(CardInterface $userRebo , $User , $serviceId ){
         
        return $userRebo->addToCard($User , $serviceId);
   }


  public function getCardWithServices(CardInterface $userRebo){

        if ($userRebo == null) {
           return null;
        }

        return $userRebo->getCardWithServices();
  }
  
  public function RemoveFromCard(CardInterface $userRebo ,$User,  $serviceId){
         
      return $userRebo->RemoveFromCard($User , $serviceId);
  }
}