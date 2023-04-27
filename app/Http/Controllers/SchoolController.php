<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shankl\Interfaces\EduSystemRepoInterface;
use Shankl\Interfaces\GradeRepoInterface;
use Shankl\Interfaces\LocationRepoInterface;

class SchoolController extends Controller
{
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

  public function schoolProfile(LocationRepoInterface $locationRepo, GradeRepoInterface $gradeRepo , EduSystemRepoInterface $eduRepo){

    
    $data['grades'] = $gradeRepo->getGrades();
    $data['eSystems'] = $eduRepo->getEduSystems(); 

    
    
    return view("web.Schools.editProfile")->with($data);
  }

   public function changePassView(){

    return view('web.Auth.School.Change_Pass');
   }


  
}
