<?php

namespace Shankl\Services;

use Shankl\Interfaces\ChildRepoInterface;
use Shankl\Repositories\ParentRepository;

class ParentService{
    private $parentRepo;
    private $childRepo;
    public function __construct(ParentRepository $parentRepo , ChildRepoInterface $childRepo)
    {
        $this->parentRepo = $parentRepo;
        $this->childRepo = $childRepo;
    }


    public function upadateProfile($data){
      
        $action = $this->parentRepo->update($data);


    }

    public function updateChild($data , $childId){
           
           
       return $this->childRepo->updateChild($childId , $data);

    }
}