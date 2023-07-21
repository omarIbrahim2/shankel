<?php

namespace  Shankl\Helpers;

use App\Jobs\CancelSubscribtion;
use App\Traits\HandleUpload;
use Illuminate\Support\Facades\Log;
use Shankl\Factories\AuthUserFactory;
use App\Notifications\EventSeatBooked;
use Shankl\Interfaces\EventRepoInterface;
use Illuminate\Support\Facades\Notification;
use Shankl\Services\FileService;

class Event{

    private $eventReboInterface;

    private $request;

     const AdminGuard = "web";

     const SchoolGuard = 'school';

    private $fileService;

    use HandleUpload;
    public function __construct(EventRepoInterface $eventRepoInterface , FileService $fileService){

        $this->eventReboInterface = $eventRepoInterface;

        $this->fileService = $fileService;

    }


    public function Add($data){

        $AuthUser = AuthUserFactory::getAuthUser();

         $data['image'] = $this->handleUpload($this->request , $this->fileService , null , 'events');
         $this->eventReboInterface->addEvent($data , $AuthUser);

        if ($this->getGuard() == self::AdminGuard) {
            toastr('event created successfully' , 'success');
            return $this->responseRoute("admin-events");

       }

          toastr('event created successfully' , 'success');
          return $this->responseRoute("school-my-events");
    }


    public function update($data){

       $event = $this->eventReboInterface->find($data['id']);


        $data['image'] = $this->handleUpload($this->request , $this->fileService , $event , 'events');


        $this->eventReboInterface->updateEvent($data , $event);


        if ($this->getGuard() == self::AdminGuard) {

            toastr("event updated successfully" , "info" , "Event update");
             return $this->responseRoute("admin-events");

        }

        toastr("event updated successfully" , "info" , "Event update");
        return $this->responseRoute('school-my-events');


    }


    public function getEvents($guard , $pages){

        return $this->eventReboInterface->getEventsAdmin($guard , $pages);
    }


    public function getEvent($eventId){


        return $this->eventReboInterface->find($eventId);

    }

    public function UserReservedEvents($pages){

       $AuthUser =  AuthUserFactory::getAuthUser();


       return $this->eventReboInterface->getReservedEvents($AuthUser , $pages);


    }



    public function setRequest($request){

        $this->request = $request;
    }

    public function bookSeat($eventId){

        $User = AuthUserFactory::getAuthUser();

         try {
            $this->eventReboInterface->subscribeUser($eventId , $User);
            $event = $this->eventReboInterface->find($eventId);
          //  Notification::send($User, new EventSeatBooked($User, $event));
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


        $event = $this->eventReboInterface->find($eventId);



        $this->eventReboInterface->updateEvent(['status' => 'Cancelled'] , $event);

        //  $subscribers = $this->getSubscribers($eventId);

        //  $this->notifySubscibers($subscribers);

    }


    private function getSubscribers($eventId){

        $Parents = $this->eventReboInterface->eventSubscribers($eventId)->ParenttsinEvent->toArray();
        $Schools =  $this->eventReboInterface->eventSubscribers($eventId)->schoolsinEvent->toArray();
        $Teachers = $this->eventReboInterface->eventSubscribers($eventId)->teachersinEvent->toArray();
        $subscribers = array_merge($Parents , $Schools , $Teachers);

        return $subscribers;

    }


    private function getGuard(){


        return AuthUserFactory::geGuard();
    }


    private function  notifySubscibers($subscribers){

        if (count($subscribers) > 0) {
            CancelSubscribtion::dispatch($subscribers)->onQueue('EventMailingQueue');
         }


    }

    private function responseView($view){

        return view($view);
    }


     private function responseRoute($route){
         if($this->getGuard()=="web"){
            return redirect()->route($route,"web");
         }
         return redirect()->route($route);

     }



}
