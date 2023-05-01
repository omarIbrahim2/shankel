<?php

namespace Shankl\Services;


use Shankl\Interfaces\EventRepoInterface;

class AdminService{
       
    private $eventRebo;
     public function __construct(EventRepoInterface $eventRebo)
     {
        $this->eventRebo = $eventRebo;
     }
    public function getEvents(){
 
          $events = $this->eventRebo->getEvents();
          
          return $events;

    }
}