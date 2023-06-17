<?php

namespace Shankl\Services;

use Shankl\Entities\ChildEntity;
use App\Http\Requests\AddChildRequest;
use Shankl\Interfaces\ChildRepoInterface;
use Shankl\Interfaces\EventRepoInterface;
use Shankl\Repositories\ParentRepository;

class ParentService extends Service{
    private $parentRepo;
    private $childRepo;
    private $EventRepo;
    public function __construct(ParentRepository $parentRepo , ChildRepoInterface $childRepo , EventRepoInterface $EventRepo)
    {
        $this->parentRepo = $parentRepo;
        $this->childRepo = $childRepo;
        $this->EventRepo = $EventRepo;
    }


    public function getActiveParent($pages){
         return $this->parentRepo->getActiveUsers($pages);

    }

    public function getUnActiveParents($pages){

         return $this->parentRepo->getUnActiveUsers($pages);
    }

    public function getParent($parentId){

        return $this->parentRepo->find($parentId);
    }

    public function upadateProfile($data){
      
        $action = $this->parentRepo->update($data);

        return $action;


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

    public function Children(){

        return $this->parentRepo->ParentChilds();
    }

    public function BookASeat($eventId , $User){
         
        $action = $this->EventRepo->subscribeUser($eventId , $User);

        return $action;

    }
}