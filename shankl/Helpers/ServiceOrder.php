<?php

namespace Shankl\Helpers;

use App\Exceptions\ServiceOrderException;
use App\Models\shanklPrice;
use App\Models\Social;
use Illuminate\Support\Facades\DB;
use Shankl\Interfaces\AbstractOrder;
use Shankl\Factories\AuthUserFactory;
use Shankl\Factories\RepositoryFactory;
use App\Notifications\OrderNotification;
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
          if ($totalPrice <= 0) {
               toastr(trans('service.orderErr') , 'error');
               return back();
          }
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
          $Shankel = Social::select('phone' , 'address', 'email', 'id')->first();
          if (count($services) == 0) {
     
               throw new ServiceOrderException();
          }

     
          DB::transaction(function () use($card , $transaction , $services) {
               $servicesIds = $services->pluck("id")->toArray();
     
               $this->serviceOrderRepo->createServices($transaction, $services);
     
               $this->serviceOrderRepo->clearCard($card, $servicesIds);
     
               $this->serviceOrderRepo->update(['id' => $transaction->id, 'status' => 'Completed']);
               $this->serviceOrderRepo->updateQuatityInservice($services);

          });
          
         
           $AuthUser->notify(new OrderNotification($transaction ,$services , $AuthUser , $Shankel ));
        //   Notification::send($AuthUser , new OrderNotification($transaction ,$services , $AuthUser , $Shankel ));
     }

     public function __destruct()
     {
          session()->pull('transaction');
     }
}
