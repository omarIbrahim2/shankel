<?php

namespace  Shankl\Helpers;

use App\Jobs\CancelSubscribtion;
use Illuminate\Support\Facades\Log;
use Shankl\Factories\AuthUserFactory;
use App\Notifications\EventSeatBooked;
use Shankl\Interfaces\EventRepoInterface;
use Illuminate\Support\Facades\Notification;

class Event{

    private $eventReboInterface;
    public function __construct(EventRepoInterface $eventRepoInterface){
        
        $this->eventReboInterface = $eventRepoInterface;

    }


    public function Add($data){
       
        $AuthUser = AuthUserFactory::getAuthUser();

        return $this->eventReboInterface->addEvent($data , $AuthUser);
    }

    public function bookSeat($eventId){
       
        $User = AuthUserFactory::getAuthUser();
 
         try {
            $this->eventReboInterface->subscribeUser($eventId , $User);
            $event = $this->eventReboInterface->find($eventId);
            Notification::send($User, new EventSeatBooked($User, $event));
            return true;
         } catch (\Exception $e) {
             
             Log::info($e->getMessage() );

            return false;
             
         }          
    }

    public function cancelBooking($eventId){

        $User =  AuthUserFactory::getAuthUser();
        
        try {
            $this->eventReboInterface->cancelSubscribeUser($eventId , $User);

            return true;
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return false;
        }

    }


    public function cancelEvent($eventId){
        
         $this->eventReboInterface->updateEvent(['id' =>$eventId , 'status' => 'Cancelled']);

         $subscribers = $this->getSubscribers($eventId);

         $this->notifySubscibers($subscribers);

    }


    private function getSubscribers($eventId){
          
        $Parents = $this->eventReboInterface->eventSubscribers($eventId)->ParenttsinEvent->toArray();
        $Schools =  $this->eventReboInterface->eventSubscribers($eventId)->schoolsinEvent->toArray();
        $Teachers = $this->eventReboInterface->eventSubscribers($eventId)->teachersinEvent->toArray();
        $subscribers = array_merge($Parents , $Schools , $Teachers);

        return $subscribers;
          
    }


    private function  notifySubscibers($subscribers){
 
        if (count($subscribers) > 0) {
            CancelSubscribtion::dispatch($subscribers)->onQueue('EventMailingQueue');
         } 


    }


    


}