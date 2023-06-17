<?php

namespace App\Listeners;

use App\Events\AddToCardEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddToCardListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AddToCardEvent $event)
    {
        $this->updateTotalPrice($event->card , $event->totalPrice);
    }


    public function updateTotalPrice($card , $totalPrice){
        
    
         $totalPriceTemp = $card->totalPrice;

        

         if ($totalPriceTemp == null) {
              
             $card->update(['totalPrice' => $totalPrice]);
             
         }else{

              $totalPriceTemp += $totalPrice;

              $card->update(['totalPrice' => $totalPriceTemp]);
         }
        

    }
}
