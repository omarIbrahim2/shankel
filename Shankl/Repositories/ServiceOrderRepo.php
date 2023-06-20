<?php

namespace Shankl\Repositories;

use App\Events\RemoveFromCardEvent;
use App\Models\Card;
use App\Models\Transaction;

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

      public function getAll($pages){

        return  Transaction::with(['services', 'transactionable'])->paginate($pages);
 
         
      }
 
      public function findById($transactionId , $pages){
           
       return Transaction::where('id' , $transactionId)->paginate($pages);
 
      }
}
