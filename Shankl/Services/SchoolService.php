<?php

namespace Shankl\Services;

use Shankl\Repositories\SchoolRepository;

class SchoolService extends Service{

  protected $schoolRepo;

  public function __construct(SchoolRepository $schoolRepo)
  {
       $this->schoolRepo = $schoolRepo;    
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

}