<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonUpdateReq;
use App\Models\Lesson;
use App\Models\Supplier;
use App\Traits\HandleUpload;
use Illuminate\Http\Request;
use Shankl\Helpers\ChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Shankl\Factories\AuthUserFactory;
use Shankl\Helpers\Event;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Services\AdminService;
use Shankl\Services\FileService;
use Shankl\Services\TeacherService;

class TeacherController extends Controller
{
  private $changePassObj, $adminService;
  public $teacherService;

  use HandleUpload;

  public function __construct(ChangePassword $changePass, TeacherService $teacherService, AdminService $adminService)
  {

    $this->changePassObj = $changePass;
    $this->teacherService = $teacherService;
    $this->adminService = $adminService;
  }
  public function showRegister(LocationRepoInterface $locationRepo)
  {

    $data['cities'] =  $locationRepo->getCities();

    return view("web.Auth.Teacher.teacherRegister")->with($data);
  }


  public function showLogin()
  {

    return view('web.Auth.Teacher.teacherLogin');
  }

  public function teacher()
  {
    $sliders = $this->adminService->getSliders();
    if (count($sliders) == 0) {
      $data['slider'] = collect()->pop();
    } else {
      $data['slider'] = $sliders->random();
    }
    return view("web.Teachers.profile")->with($data);
  }

  function getAllTeachers()
  {
    return view("web.Teachers.allTeachers");
  }

  function getOneTeacher($teacherId)
  {
    $teacher = $this->teacherService->getTeacher($teacherId);
    $lessons = $this->teacherService->getLessons($teacherId, 10);
    return view("web.Teachers.teacherPage")->with([
      'teacher' => $teacher,
      'lessons' => $lessons,
    ]);
  }

  public function teacherProfile()
  {

    $authUser = Auth::guard('teacher')->user();



    return view('web.Teachers.editProfile')->with(["authUser" => $authUser]);
  }

  public function getTeacherAdmin($id)
  {

    return view("admin.teachers.details")->with(['id' => $id]);
  }


  public function changePassView()
  {

    return view("web.Auth.Teacher.change-pass");
  }


  public function changePass(Request $request, $guard)
  {



    $result = $this->changePassObj->changePass($request, $guard);

    if ($result == false) {
      return back()->with('error', trans('auth.oldPassMsg'));
    }

    $url =  Config::get('auth.custom.' . $guard . ".url");
    toastr(trans('auth.passwordChange'), 'success');
    return redirect()->route($url);
  }


  public function FilterSuppliers(Request $request)
  {

    $query = Supplier::query();
    $Suppliers =  $this->search($request->query(), $query);

    return view("web.Suppliers.filteredSuppliers")->with(['Suppliers' => $Suppliers]);
  }

  public function reservedEvents(Event $EventObj)
  {
    $Events = $EventObj->UserReservedEvents(5);
    return view("web.events.ReservedEvents")->with(['Events' => $Events]);
  }

  public function publicLessons()
  {
    return view("web.Teachers.publicLessons");
  }

  public function deleteLesson($lessonId)
  {

    $this->teacherService->deleteLesson($lessonId);
    toastr(trans('teacher.deleteLesson'), 'warning');

    return back();
  }

  private function evaluateLessonData($request)
  {
    $data = array();
    if (array_key_exists('id', $request)) {

      $data['id'] = $request['id'];
    }
    $data['title'] = json_encode([
      'en' => $request['title_en'],
      'ar' => $request['title_ar'],
    ]);

    $data['url'] = $request['url'];
    return $data;
  }

  public function updateLesson(LessonUpdateReq $request, FileService $fileService)
  {

    $validatedReq = $request->validated();
    $data = $this->evaluateLessonData($validatedReq);
    
    $this->teacherService->updateLesson($data , $request->file('image'));

    toastr(trans('generalMessages.updateMsg'), 'success');


    return back();
  }
}
