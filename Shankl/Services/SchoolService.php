<?php

namespace Shankl\Services;

use Shankl\Repositories\SchoolRepository;

class SchoolService{

  protected $schoolRepo;

  public function __construct(SchoolRepository $schoolRepo)
  {
       $this->schoolRepo = $schoolRepo;    
  }


  public function updateProfile($data){
        
     
      $this->schoolRepo->update($data);
  }

  public function updatedGrades(array $grades , $schooId){

        $this->schoolRepo->updateGrades($grades , $schooId);
  }

}