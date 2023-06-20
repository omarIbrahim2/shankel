<?php

namespace Shankl\Helpers;

use App\Notifications\OrderNotification;
use Shankl\Interfaces\AbstractOrder;
use Shankl\Factories\AuthUserFactory;
use Shankl\Factories\RepositoryFactory;
use Shankl\Repositories\ServiceOrderRepo;
use Illuminate\Support\Facades\Notification;

class ServiceOrder extends AbstractOrder
{


     private $serviceOrderRepo;
     public function __construct(ServiceOrderRepo $serviceOrderRepo)
     {
          $this->serviceOrderRepo = $serviceOrderRepo;
     }

     public function getTotalPrice()
     {
          $AuthUser= AuthUserFactory::getAuthUser();
           return $AuthUser->card->totalPrice;
     }

     public function prepareOrder()
     {
          $orderCode = $this->generateOrderCode();
          $AuthUser = AuthUserFactory::getAuthUser();
          $totalPrice = $AuthUser->card->totalPrice;
          
          $transaction = $this->serviceOrderRepo->create($AuthUser, $orderCode , $totalPrice);

          session()->put("transaction", $transaction);
          return $transaction;
     }

     public function handleOrder()
     {

          $AuthUser = AuthUserFactory::getAuthUser();

          $card = $AuthUser->card;
          $transaction = session()->get('transaction');

          $services = $this->serviceOrderRepo->getCardServices($card);

          $servicesIds = $services->pluck("id")->toArray();

          $this->serviceOrderRepo->createServices($transaction, $servicesIds);

          $this->serviceOrderRepo->clearCard($card, $servicesIds);

          Notification::send($AuthUser , new OrderNotification($transaction ,$services , $AuthUser ));
          return $this->serviceOrderRepo->update(['id' => $transaction->id, 'status' => 'Completed']);
     }

     public function __destruct()
     {
          session()->pull('transaction');
     }
}
