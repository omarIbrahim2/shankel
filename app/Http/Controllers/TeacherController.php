<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Shankl\Helpers\ChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Services\TeacherService;

class TeacherController extends Controller
{
   private $changePassObj;
   public $teacherService;

    public function __construct(ChangePassword $changePass , TeacherService $teacherService)
    {  

      $this->changePassObj = $changePass;
      $this->teacherService = $teacherService;
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

      function getAllTeachers() {
        
        return view("web.Teachers.allTeachers");
      }

      function getOneTeacher($teacherId){
        $teacher = $this->teacherService->getTeacher($teacherId);
        $lessons = $this->teacherService->getLessons($teacherId);
        return view("web.Teachers.teacherPage")->with([
          'teacher' => $teacher,
          'lessons' => $lessons,
        ]);
      }

      public function teacherProfile(){
         
        $authUser = Auth::guard('teacher')->user();

        return view('web.Teachers.editProfile')->with(["authUser" => $authUser]);

      }

      public function getTeacherAdmin($id){
      
        return view("admin.teachers.details")->with(['id' => $id]);
    
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


      public function FilterSuppliers(Request $request){
      
        $query = Supplier::query();
         $Suppliers =  $this->search($request->query() , $query );
         
         return view("web.Suppliers.filteredSuppliers")->with(['Suppliers' => $Suppliers]);
     }

}