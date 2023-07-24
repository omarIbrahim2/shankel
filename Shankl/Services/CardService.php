<?php


namespace Shankl\Services;

use Shankl\Interfaces\CardInterface;


class CardService{


public function AddToCard(CardInterface $userRebo , $User , $serviceId , $quantity ){
         
        return $userRebo->addToCard($User , $serviceId , $quantity);
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

  public function calculateTotalPrice($Services){


    $sum = 0;
    foreach ($Services as $service) {
      $servicePrice = $service->price;
      $quantity = $service->pivot->quantity;
      $sum += $servicePrice * $quantity;
    }

    return $sum;
  }

  public function UpdateCard(CardInterface $UserRepo , $User , $quantity , $serviceId){

       
       $UserRepo->updateCard($User , $serviceId , $quantity);


  }

  
 



}
