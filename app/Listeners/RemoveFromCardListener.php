<?php

namespace App\Listeners;

use App\Events\RemoveFromCardEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RemoveFromCardListener
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
    public function handle(RemoveFromCardEvent $event)
    {
        $this->updateTotalPrice($event->card , $event->totalPrice);
    }

    public function updateTotalPrice($card , $totalPrice){
        
    
        $totalPriceTemp = $card->totalPrice;

       

        if ($totalPriceTemp == null) {
             
            $card->update(['totalPrice' => $totalPrice]);
            
        }else{

             $totalPriceTemp -= $totalPrice;

             $card->update(['totalPrice' => $totalPriceTemp]);
        }
       

   }
}
