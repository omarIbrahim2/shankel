<?php

namespace App\Http\Controllers;

use App\Events\SchoolViews;
use Illuminate\Http\Request;
use Shankl\Helpers\ChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Shankl\Interfaces\GradeRepoInterface;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Interfaces\EduSystemRepoInterface;
use Shankl\Services\SchoolService;

class SchoolController extends Controller
{
  private $changePassObj;
  private $schoolService;
  public function __construct(ChangePassword $changepass , SchoolService $schoolService)
  {
    $this->changePassObj = $changepass;
    $this->schoolService = $schoolService;
  }

  public function index(){
   
     return view('web.Schools.schools');    
  }
  public function showRegister(LocationRepoInterface $locationRepo, GradeRepoInterface $gradeRepo , EduSystemRepoInterface $eduRepo )
  {

    $data['cities'] =  $locationRepo->getCities();
    $data['grades'] = $gradeRepo->getGrades();
    $data['eSystems'] = $eduRepo->getEduSystems();

    return view("web.Auth.School.schoolRegister")->with($data);
  }

  public function showLogin(){
     
    return view("web.Auth.School.schoolLogin");
  }


  public function school(){
    
    return view("web.Schools.profile");
  }

  public function schoolProfile( GradeRepoInterface $gradeRepo , EduSystemRepoInterface $eduRepo){

    
    $data['grades'] = $gradeRepo->getGrades();
    $data['eSystems'] = $eduRepo->getEduSystems(); 

    
    
    return view("web.Schools.editProfile")->with($data);
  }

   public function changePassView(){

    return view('web.Auth.School.Change_Pass');
   }

  public function changePass(Request $request  , $guard){

    $result = $this->changePassObj->changePass($request , $guard);

    if ($result == false) {
      return back()->with('error' , "old password doesn't match");
    }
   $url =  Config::get('auth.custom.' . $guard . ".url");
  
    return redirect()->route($url);
  }


  public function getSchool($shoolId){
       
      
     $school  = $this->schoolService->getSchool($shoolId);

     if (! $school) {
        return back();
     }

     event(new SchoolViews($school));
    
     return view("web.Schools.schoolPage")->with(['School' => $school]);

  }
  
}
