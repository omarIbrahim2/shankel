<?php

namespace App\Listeners;

use App\Events\UpdateCard;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class updateCardListener
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
    public function handle(UpdateCard $event)
    {
       

        if ($event->oldQuantity > $event->newQuantity) {
               
              $subtractedValue =  ($event->oldQuantity - $event->newQuantity) * $event->service->price;
            
            
              $event->card->totalPrice = abs($event->card->totalPrice -  $subtractedValue);

              $event->card->save();
        }elseif($event->oldQuantity < $event->newQuantity){
                   
            $addedValue =  ($event->newQuantity - $event->oldQuantity) * $event->service->price;
            
            $event->card->totalPrice += $addedValue;

            $event->card->save();

        }elseif($event->oldQuantity == $event->newQuantity){
              
              $subtractedValue = $event->oldQuantity * $event->service->price;

              $event->card->totalPrice = abs($event->card->totalPrice -  $subtractedValue);

              $event->card->save();

        }
    }
}
