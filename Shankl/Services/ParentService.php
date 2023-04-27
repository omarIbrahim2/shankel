<?php

namespace Shankl\Services;

use Shankl\Entities\ChildEntity;
use App\Http\Requests\AddChildRequest;
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

    public function addChild(AddChildRequest $request){
          
        $validated = $request->validated();

        $childObj = new ChildEntity($validated);

        $this->childRepo->create($childObj->getAttributes());
        
    }

    public function updateChild($data , $childId){
           
           
       return $this->childRepo->updateChild($childId , $data);

    }

    public function deleteChild($childId){

        return $this->childRepo->delete($childId);
    }
}