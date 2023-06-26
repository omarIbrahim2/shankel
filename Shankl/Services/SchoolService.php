<?php

namespace Shankl\Services;

use Shankl\Interfaces\EventRepoInterface;
use Shankl\Repositories\CommentRepo;
use Shankl\Repositories\SchoolRepository;

class SchoolService extends Service{

  protected $schoolRepo;
  private $EventRepo , $commentRepo;

  public function __construct(SchoolRepository $schoolRepo , EventRepoInterface $EventRepo , CommentRepo $commentRepo)
  {
       $this->schoolRepo = $schoolRepo;
       $this->EventRepo = $EventRepo;   
       $this->commentRepo = $commentRepo; 
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

public function addComment($user , $comment , $schooId){
   
    return $this->commentRepo->createComment($user , $comment , $schooId);

}

public function getComments($schooId){

    return $this->commentRepo->getComments($schooId);
}

public function updateComment($newComment , $commentId){

    return $this->commentRepo->updateComment($newComment , $commentId);
}

public function areaSuppliers($pages){
    return $this->schoolRepo->getAreaSuppliers($pages);
}

public function AllStudents($pages) {
    return $this->schoolRepo->getAllStudents($pages);
}
}