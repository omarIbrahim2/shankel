<?php

namespace Shankl\Repositories;

use App\Models\Card;
use Shankl\Factories\AuthUserFactory;
use Shankl\Interfaces\CardInterface;

abstract class AbstractUserRepo implements CardInterface
{

  

  public function getCardWithServices()
  {
    $AuthUser = AuthUserFactory::getAuthUser();

    $card = $AuthUser->card;

    if ($card) {
      return Card::with(['services'])->where('id', $card->id)->first();
    }


    $createdCard = $AuthUser->card()->create([
      "user_id" => $AuthUser->id,
    ]);


    return Card::with(['services'])->where('id', $createdCard->id)->get();
  }


  public function addToCard($user, $serviceId , $quantity)
  {

    $userCard =   $user->card;

    if ($userCard == null) {

      $createdCard =   $user->card()->create([
        "user_id" => $user->id,
      ]);

      return $createdCard->services()->attach([$serviceId] , ['quantity' => $quantity]);
    } else {

      return  $userCard->services()->attach([$serviceId] , ['quantity' => $quantity]);
    }
  }

  public function RemoveFromCard($User, $serviceId)
  {

    $parentCard = $User->card;


    return $parentCard->services()->detach([$serviceId]);
  }
}
