<?php

namespace Shankl\Services;

use Shankl\Repositories\ParentRepository;

class ParentService{
    private $parentRepo;
    public function __construct(ParentRepository $parentRepo)
    {
        $this->parentRepo = $parentRepo;
    }


    public function upadateProfile($data){
      
        $action = $this->parentRepo->update($data);


    }
}