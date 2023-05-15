<?php
namespace Shankl\Repositories;

use App\Models\Event;

use Shankl\Interfaces\EventRepoInterface;

class EventRepository implements EventRepoInterface{

   public function getEvents($pages){
       
       return Event::with('area.city')->paginate($pages);

   }

   public function getEventsWeb($userId = null){
       
      if ($userId == null) {
         return;
      }
      return Event::with(['ParenttsinEvent'  , 'area.city'] , function($query) use($userId){

               $query->where('id'  , $userId);
      })->get()->map(function($event){

         return   $event->setAttribute("booked" , $event->ParenttsinEvent->isNotEmpty());
      });

   }

   public function addEvent($data)
   {
      return Event::create($data);
   }

   public function find($eventId){

     return Event::findOrFail($eventId);

   }

   public function updateEvent($data)
   {
      $event = $this->find($data['id']);

     return $event->update($data);
   }

   public function subscribeUser($eventId , $User){
            
      $event =  $this->find($eventId);

      if(! $event){

         return false;
      }

      $User->eventSubscribers()->attach([$event->id]);

      return true;

   }
}