<?php

namespace Shankl\Repositories;

use App\Models\Card;
use App\Models\Service;
use App\Events\AddToCardEvent;
use App\Events\RemoveFromCardEvent;
use Shankl\Interfaces\CardInterface;
use Shankl\Factories\AuthUserFactory;

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
    return Card::with(['services'])->where('id', $createdCard->id)->first();
  }


  public function addToCard($user, $serviceId, $quantity)
  {
    $service = Service::select('price')->findOrFail($serviceId);
    $totalPrice = $service->price * $quantity;
    event(new AddToCardEvent($user->card, $totalPrice));
    $createdCard =   $user->card()->updateOrCreate(["user_id" => $user->id,]);
    return $createdCard->services()->attach([$serviceId], ['quantity' => $quantity]);
  }

  public function RemoveFromCard($User, $serviceId)
  {
    $parentCard = $User->card;
    $service = $parentCard->services()->where('id' , $serviceId)->first();
    $quantity = $service->pivot->quantity;
    $SubstractedTotal = $service->price * $quantity;
    event(new RemoveFromCardEvent($parentCard,  $SubstractedTotal ));
    return $parentCard->services()->detach([$serviceId]);
  }


  
}
