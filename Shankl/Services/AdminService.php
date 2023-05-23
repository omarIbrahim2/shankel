<?php

namespace Shankl\Services;

use PhpParser\Node\Stmt\Return_;
use Shankl\Interfaces\EventRepoInterface;
use Shankl\Repositories\SocialsRepository;

class AdminService{
       
    private $eventRebo;

    private $socialRebo;
     public function __construct(EventRepoInterface $eventRebo , SocialsRepository $socialRebo)
     {
        $this->eventRebo = $eventRebo;
        $this->socialRebo = $socialRebo;
     }
    public function getEvents($pages){
 
          $events = $this->eventRebo->getEvents($pages);
          
          return $events;

    }

    public function addEvent($data){

       return  $this->eventRebo->addEvent($data);
          
    }

    public function getEvent($eventId){

      return $this->eventRebo->find($eventId);
    }

    public function updateEvent($data){
       
      return $this->eventRebo->updateEvent($data);

    } 

    public function getSocials(){

      return $this->socialRebo->getSocials();
    }

    public function getSocial($socialId){
         
      return $this->socialRebo->getSocial($socialId);

    }

    public function AddSocial($data)
    {
      return $this->socialRebo->create($data);
    }

    public function UpdateSocial($data , $socialId){

      return $this->socialRebo->update($data , $socialId);
    }

    public function deleteSocial($socialId){

      return $this->socialRebo->delete($socialId);
    }

    
}