<?php

namespace Shankl\Repositories;

use App\Models\Card;
use App\Models\School;
use App\Models\Parentt;
use App\Models\Teacher;
use App\Models\Transaction;
use App\Events\RemoveFromCardEvent;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ServiceOrderRepo{

   public function create($AuthUser , $orderCode , $totalPrice){
        return $AuthUser->transactions()->create([
          'barcode' => $orderCode,
          'status' => 'Pending',
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

    public function createServices($transaction ,  $services){

    
      $transaction->services()->attach($services);
    }


   public function update($data ){

        $order =Transaction::findOrFail($data['id']);
         return $order->update($data);
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
        return Transaction::with(['services:name,desc,price'])->findOrFail($transactionId);
      }
}
