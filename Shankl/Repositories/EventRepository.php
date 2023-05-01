<?php
namespace Shankl\Repositories;

use App\Models\Event;

use Shankl\Interfaces\EventRepoInterface;

class EventRepository implements EventRepoInterface{

   public function getEvents(){
       
       return Event::paginate(6);

   }
}