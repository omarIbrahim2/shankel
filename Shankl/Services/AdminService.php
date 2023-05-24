<?php

namespace Shankl\Services;

use PhpParser\Node\Stmt\Return_;
use Shankl\Interfaces\EventRepoInterface;
use Shankl\Repositories\SliderRepo;
use Shankl\Repositories\SocialsRepository;

class AdminService{
       
    private $eventRebo;
    private $sliderRebo;
    private $socialRebo;
     public function __construct(EventRepoInterface $eventRebo , SocialsRepository $socialRebo , SliderRepo $sliderRebo)
     {
        $this->eventRebo = $eventRebo;
        $this->socialRebo = $socialRebo;
        $this->sliderRebo = $sliderRebo;
     }

    //Events 
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

    //Sliders

    public function getSliders(){

      return $this->sliderRebo->getSliders();
    }

    public function getSlider($sliderId){
         
      return $this->sliderRebo->getSlider($sliderId);

    }

    public function addSlider($data)
    {
      return $this->sliderRebo->createSlider($data);
    }

    public function updateSlider($data , $sliderId){

      return $this->sliderRebo->updateSlider($data , $sliderId);
    }

    public function deleteSlider($sliderId){

      return $this->sliderRebo->deleteSlider($sliderId);
    }

    //Socials

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