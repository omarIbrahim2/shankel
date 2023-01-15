<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddChildRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Shankl\Entities\ChildEntity;
use Shankl\Interfaces\ChildRepoInterface;
use Shankl\Interfaces\GradeRepoInterface;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Repositories\ParentRepository;

class ParentController extends Controller
{
    public function showRegister(LocationRepoInterface $locationRepo){
       
       $data['cities'] =  $locationRepo->getCities();

         return view("web.Auth.parentRegister")->with($data);
    }

    public function addChild($parentId , ParentRepository $parentRepo , GradeRepoInterface $gradeRepo){

       $currParent = $parentRepo->find($parentId);
       $grades = $gradeRepo->getGrades();

       return view('web.parents.add-child')->with([
         'parent_id' => $currParent->id,
         'grades' => $grades
       ]);

    }

    public function createChild(ChildRepoInterface $childRepo , AddChildRequest $request)
    {
    
       $request->validated();

       $childObj = new ChildEntity($request->all());
         
       $childRepo->create($childObj->getAttributes());

       return redirect()->route('parent');
    }

    public function parent()
    {
      return view('web.Parents.profile');
    }


    public function showLogin(){

      return view('web.Auth.parentLogin');
    }

    public function showProfile(){
      
      return view("web.Parents.editProfile");
    }
}
