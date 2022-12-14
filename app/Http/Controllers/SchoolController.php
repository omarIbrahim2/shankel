<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    return view("web.Auth.schoolRegister")->with($data);
  }

  public function showLogin(){
     
    return view("web.Auth.schoolLogin");
  }


  public function school(){

    return view("web.Schools.profile");
  }
}
