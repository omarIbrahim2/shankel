<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\EduSystem;
use App\Events\SchoolViews;
use Illuminate\Http\Request;
use Shankl\Helpers\ChangePassword;
use Shankl\Services\SchoolService;
use Illuminate\Support\Facades\Config;
use Shankl\Interfaces\GradeRepoInterface;
use App\Http\Requests\CommentUpdateRequest;
use PHPUnit\Framework\Constraint\Count;
use Shankl\Factories\AuthUserFactory;
use Shankl\Helpers\Event;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Interfaces\EduSystemRepoInterface;
use Shankl\Services\AdminService;

class SchoolController extends Controller
{
  private $changePassObj;
  private $schoolService , $adminService;
  public function __construct(ChangePassword $changepass , SchoolService $schoolService , AdminService $adminService)
  {
    $this->changePassObj = $changepass;
    $this->schoolService = $schoolService;
    $this->adminService = $adminService ;
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


  public function school( LocationRepoInterface $locationRepo, GradeRepoInterface $gradeRepo, EduSystemRepoInterface $eduSystems){
    $data['Areas'] = $locationRepo->getAreas();
    $data['Grades'] = $gradeRepo->getGrades();
    $data['Esystems'] = $eduSystems->getEduSystems();
    $sliders = $this->adminService->getSliders();
    if (count($sliders) == 0) {
      $data['slider'] = collect()->pop();
    } else {
      $data['slider'] = $sliders->random();
    }
    $data['students'] = $this->schoolService->AllStudents(5);
    $data['studentsParents'] =$this->schoolService->studentsParents();
    return view("web.Schools.profile")->with($data);
  }

  public function schoolProfile( LocationRepoInterface $locationRepo , EduSystemRepoInterface $eduRepo){

    $data['eSystems'] = $eduRepo->getEduSystems(); 

    $data['Cities'] = $locationRepo->getCities();
    return view("web.Schools.editProfile")->with($data);
  }

   public function changePassView(){

    return view('web.Auth.School.Change_Pass');
   }

  public function changePass(Request $request  , $guard){

    $result = $this->changePassObj->changePass($request , $guard);

    if ($result == false) {
      return back()->with('error' , trans('auth.oldPassMsg'));
    }
   $url =  Config::get('auth.custom.' . $guard . ".url");
     toastr(trans("register.changepass") , "success");
    return redirect()->route($url);
  }


  public function getSchool($shoolId){
       
      
     $school  = $this->schoolService->getSchool($shoolId);

    

    

     event(new SchoolViews($school));
      $EduId = $school->edu_systems_id;
      $Es =  EduSystem::findOrfail($EduId);    
     return view("web.Schools.schoolPage")->with(['School' => $school , "Es" => $Es]);

  }

  public function getSchoolAdmin($id){
      
    return view("admin.schools.details")->with(['id' => $id]);

  }


  public function updateComment(CommentUpdateRequest $request){
       
   $validatedReq =  $request->validated();
       
    $action = $this->schoolService->updateComment($validatedReq['comment'] , $validatedReq['id']);
    
    if ($action) {
        toastr("updated successfully" , "success" , "update comment");

        return back();
    }
    
    toastr("error happened in updating" , "error" , "update comment");
    return back();
  }



 public function addEvent(LocationRepoInterface $locationRepo){
   
  $cities =  $locationRepo->getCities();
  return view('web.schools.addEvent')->with([

    'cities' => $cities,
  ]);
 }

 

 public function reservedEvents(Event $EventObj){

   $Events = $EventObj->UserReservedEvents(5);
  return view("web.events.ReservedEvents")->with(['Events' => $Events]);
}

public function schoolEvents(){



 $AuthUser =  AuthUserFactory::getAuthUser();

   $Events = $AuthUser->events()->with('area.city')->paginate(10);

  
  
  return view("web.schools.schoolEvents")->with(['Events' => $Events]);
}

public function areaSuppliers() {
  return view("web.schools.areaSuppliers");
}

public function schoolStudents(){
  return view("web.schools.students");
}
  
}
