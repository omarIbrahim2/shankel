<?php
namespace Shankl\Repositories;

use App\Models\Event;

use Shankl\Interfaces\EventRepoInterface;

class EventRepository implements EventRepoInterface{

   public function getEvents(){
       
       return Event::paginate(6);

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
}