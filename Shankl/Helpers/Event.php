<?php

namespace  Shankl\Helpers;

use Shankl\Factories\AuthUserFactory;
use Shankl\Interfaces\EventRepoInterface;

class Event{

    private $eventReboInterface;
    public function __construct(EventRepoInterface $eventRepoInterface){
        
        $this->eventReboInterface = $eventRepoInterface;

    }


    public function Add($data){
       
        $AuthUser = AuthUserFactory::getAuthUser();

        return $this->eventReboInterface->addEvent($data , $AuthUser);
    }


    


}