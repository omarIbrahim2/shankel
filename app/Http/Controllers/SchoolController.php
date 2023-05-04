<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shankl\Helpers\ChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Shankl\Interfaces\GradeRepoInterface;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Interfaces\EduSystemRepoInterface;

class SchoolController extends Controller
{
  private $changePassObj;
  public function __construct(ChangePassword $changepass)
  {
    $this->changePassObj = $changepass;
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
  
}
