<?php

namespace Shankl\Repositories;

use App\Models\Card;
use App\Models\School;
use App\Models\Parentt;
use App\Models\Teacher;
use App\Models\Transaction;
use App\Events\RemoveFromCardEvent;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\DB;

class ServiceOrderRepo{

   public function create($AuthUser , $orderCode , $totalPrice){
        return $AuthUser->transactions()->create([
          'barcode' => $orderCode,
          'status' => 'Cancelled',
          'total_price' => $totalPrice,
     ]);
    }


    public function getCardServices($card){
        
       return $card->services()->where('card_id' , $card->id)->get(); 
    }

    public function clearCard($card , $services){
      event(new RemoveFromCardEvent($card , $card->totalPrice));
      $card->services()->detach($services);
      
    }

    public function updateQuatityInservice($services){
         
       foreach($services as $service){
          
          $quatityInCard = $service->pivot->quantity;

          $newQuantity = $service->quantity - $quatityInCard;

          $service->update(['quantity' => $newQuantity]);


       }


    }

    public function createServices($transaction ,  $services){
         

      foreach($services as $service){
          
        $transaction->services()->attach($service->id , ["service_order_quantity" => $service->pivot->quantity]);
      }
    
      
    }


   public function update($data ){
      
          $order =Transaction::findOrFail($data['id']);
           $order->update($data);
    
      
      }

      public function getAll($pages , ...$attrs){
        
        return  Transaction::select(...$attrs)->with('transactionable' , function (MorphTo $morphTo){
         
          $morphTo->morphWith([
            Parentt::class,
            School::class,
            Teacher::class,
          ]);
          
        })->paginate($pages);
 
         
      }
 
      public function findById($transactionId , $pages){
           
       return Transaction::with('transactionable' 

       )->where('id' , $transactionId)->paginate($pages);
 
      }

      public function transactionService($transactionId){
        return Transaction::with(['services:id,name,desc,price' , "transactionable" => function(MorphTo $morphTo){
             
          $morphTo->morphWith([
            Parentt::class,
            School::class,
            Teacher::class,
          ]);
        }])->findOrFail($transactionId);
      }
}
