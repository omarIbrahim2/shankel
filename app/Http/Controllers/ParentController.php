<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddChildRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Shankl\Entities\ChildEntity;
use Shankl\Helpers\ChangePassword;
use Shankl\Interfaces\ChildRepoInterface;
use Shankl\Interfaces\GradeRepoInterface;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Repositories\ParentRepository;
use Shankl\Services\ParentService;

class ParentController extends Controller
{
  private $changePassObj;
  public function __construct(ChangePassword $changePass)
  {
    $this->changePassObj = $changePass;
    
  }
    public function showRegister(LocationRepoInterface $locationRepo){
       
       $data['cities'] =  $locationRepo->getCities();

         return view("web.Auth.Parent.parentRegister")->with($data);
    }

    public function addChild($parentId , ParentRepository $parentRepo , GradeRepoInterface $gradeRepo){

       $currParent = $parentRepo->find($parentId);
       $grades = $gradeRepo->getGrades();

       return view('web.Auth.Parent.add-child')->with([
         'parent_id' => $currParent->id,
         'grades' => $grades
       ]);

    }

    public function showAddChild($parentId , ParentRepository $parentRepo , GradeRepoInterface $gradeRepo){
      $currParent = $parentRepo->find($parentId);
      $grades = $gradeRepo->getGrades();

      return view('web.Parents.add-child')->with([
        'parent_id' => $currParent->id,
        'grades' => $grades
      ]);

          
    }

    public function createChild( AddChildRequest $request , ParentService $parentService)
    {
    
      $parentService->addChild($request);
       
      
       return redirect()->route('parent');
    }

    
    public function InsertChild(AddChildRequest $request , ParentService $parentService){
     
      $parentService->addChild($request);
       
      toastr("child added successfully" , "success");
      return redirect()->route('parent-profile');
    }

    public function parent()
    {
      return view('web.Parents.profile');
    }


    public function showLogin(){

      return view('web.Auth.Parent.parentLogin');
    }

    public function showProfile(ParentRepository $parentRepository , GradeRepoInterface $gradeRepo){
      
       $chidren = $parentRepository->ParentChilds();
       $grades = $gradeRepo->getGrades();
      return view("web.Parents.editProfile")->with([
        'children' => $chidren,
        'grades' => $grades
      ]);
    }

    public function changePassView(){
       
        return view("web.Auth.Parent.Change_Pass");
    }

    public function changePass(Request $request  , $guard){
         
         
        
          $result = $this->changePassObj->changePass($request , $guard);

          if ($result == false) {
            return back()->with('error' , "old password doesn't match");
          }
         $url =  Config::get('auth.custom.' . $guard . ".url");
        
          return redirect()->route($url);
    }



  
}
