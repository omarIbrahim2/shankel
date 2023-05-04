<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shankl\Helpers\ChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Shankl\Interfaces\LocationRepoInterface;

class TeacherController extends Controller
{
   private $changePassObj;

    public function __construct(ChangePassword $changePass)
    {  

      $this->changePassObj = $changePass;
      
    }
    public function showRegister(LocationRepoInterface $locationRepo){
       
        $data['cities'] =  $locationRepo->getCities();
 
          return view("web.Auth.Teacher.teacherRegister")->with($data);
     }


     public function showLogin(){

        return view('web.Auth.Teacher.teacherLogin');
      }

      public function teacher(){
           
          return view("web.Teachers.profile");
      }

      public function teacherProfile(){
         
        $authUser = Auth::guard('teacher')->user();

        return view('web.Teachers.editProfile')->with(["authUser" => $authUser]);

      }


      public function changePassView(){

          return view("web.Auth.Teacher.change-pass");
      }


      public function changePass(Request $request  , $guard){
          
      
        
       $result = $this->changePassObj->changePass($request , $guard);
       
       if ($result == false) {
        return back()->with('error' , "old password doesn't match");
       }
       
       $url =  Config::get('auth.custom.' . $guard . ".url");
       toastr("paswword changed successfully" , 'success');
        return redirect()->route($url);
             
      }



}