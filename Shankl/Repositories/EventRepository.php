<?php

namespace Shankl\Repositories;

use App\Http\Livewire\Admin\Parents;

use App\Models\Event;
use App\Models\Parentt;
use App\Models\School;
use App\Models\Teacher;
use Shankl\Interfaces\EventRepoInterface;

class EventRepository implements EventRepoInterface
{

   public function getEventsAdmin( $guard ,$pages)
   {
      return Event::select('id' , 'title' , 'start_date' , 'end_date' , 'image' , 'start_time' , 'end_time' , 'status')->with('area.city')
      ->where('eventable_type' , $guard)
      ->orderBy('start_date', 'ASC')->paginate($pages);
   }

   public function getEventsguest($pages)
   {
      return Event::with('area.city')->where('status', 'in Progress')->orderBy('start_date', 'ASC')->paginate($pages);
   }

   public function getEventsWeb($userId = null, $guard)
   {

      
      if ($userId == null && $guard == 'guest') {

         return null;
      }

      if ($guard == 'parent') {
         return Event::with(['ParenttsinEvent', 'area.city'], function ($query) use ($userId) {

            $query->where('id', $userId);
         })->where('status', 'in Progress')
          


         ->orderBy('start_date', 'DESC')->get()->map(function ($event) {

            return   $event->setAttribute("booked", $event->ParenttsinEvent->isNotEmpty());
         });
      } else if ($guard == 'school') {
         return Event::with(['schoolsinEvent', 'area.city'], function ($query) use ($userId) {
            
             
            $query->where('id', $userId);
         })->where('status', 'in Progress')->orderBy('start_date', 'DESC')->get()->map(function ($event) {
            
            return   $event->setAttribute("booked", $event->schoolsinEvent->isNotEmpty());
         });
      } elseif ($guard == 'teacher') {


         return Event::with(['teachersinEvent', 'area.city'], function ($query) use ($userId) {

            $query->where('id', $userId);
         })->where('status', 'in Progress')->orderBy('start_date', 'DESC')->get()->map(function ($event) {

            return   $event->setAttribute("booked", $event->teachersinEvent->isNotEmpty());
         });
      }
   }

   // public function getReservedEvents($userId = null, $guard){
   //    $allEvents = $this->getEventsWeb($userId,$guard)->where('eventable_id' , $userId);
   //    $resrvedEvents = $allEvents->where('booked' , true);
   //    return $resrvedEvents;
   // }


   public function getReservedEvents($AuthUser , $pages){
        
       $resrvedEvents =$AuthUser->eventSubscribers()->with(['area.city'])->get()->map(function($event){

         return $event->setAttribute('booked' , true);
       });
        

      return Event::paginate($resrvedEvents , $pages);
   }

   public function eventSubscribers($eventId)
   {

      return Event::with(['ParenttsinEvent', 'schoolsinEvent', 'teachersinEvent'])->where('id', $eventId)->first();
   }

   public function addEvent($data , $AuthUser)
   {
      return $AuthUser->events()->create($data);
   }

   public function find($eventId)
   {

      return Event::findOrFail($eventId);
   }

   public function updateEvent($data , $event)
   {
      
      

      return $event->update($data);
   }

   public function subscribeUser($eventId, $User)
   {

      $event =  $this->find($eventId);

      if (!$event) {

         return false;
      }

      $User->eventSubscribers()->attach([$event->id]);

      return true;
   }

   public function cancelSubscribeUser($eventId, $User)
   {

      $event =  $this->find($eventId);

      if (!$event) {

         return false;
      }

      $User->eventSubscribers()->detach([$event->id]);

      return true;
   }
  


}
