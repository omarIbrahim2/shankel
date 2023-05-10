<?php

namespace Shankl\Services;

use Shankl\Interfaces\EventRepoInterface;
use Shankl\Repositories\SchoolRepository;

class SchoolService extends Service{

  protected $schoolRepo;

  private $EventRepo;

  public function __construct(SchoolRepository $schoolRepo , EventRepoInterface $EventRepo)
  {
       $this->schoolRepo = $schoolRepo;
       $this->EventRepo = $EventRepo;    
  }
   
   
  public function getActiveSchools($pages){
      
     return $this->schoolRepo->getActiveUsers($pages);
     
  }

  public function getUnActiveSchools($pages){

       return $this->schoolRepo->getUnActiveUsers($pages);
  }

  public function updateProfile($data){
        
     
      $this->schoolRepo->update($data);
  }

  public function updatedGrades(array $grades , $schooId){

        $this->schoolRepo->updateGrades($grades , $schooId);
  }


  public function getSchool($schoolId){

      return $this->schoolRepo->find($schoolId);
  }


  public function getSchoolGrades($schoolId){

     return $this->schoolRepo->SchoolGrades($schoolId);
  }

  public function BookASeat($eventId , $User){
         
    $action = $this->EventRepo->subscribeUser($eventId , $User);

    return $action;

}

}