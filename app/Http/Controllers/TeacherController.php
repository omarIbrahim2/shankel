<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shankl\Interfaces\LocationRepoInterface;

class TeacherController extends Controller
{
    public function showRegister(LocationRepoInterface $locationRepo){
       
        $data['cities'] =  $locationRepo->getCities();
 
          return view("web.Auth.teacherRegister")->with($data);
     }


     public function showLogin(){

        return view('web.Auth.teacherLogin');
      }

      public function teacher(){

          return view("web.Teachers.profile");
      }



}