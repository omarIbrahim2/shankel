<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Supplier;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Shankl\Entities\ChildEntity;
use Shankl\Helpers\ChangePassword;
use Shankl\Services\ParentService;
use Shankl\Services\SchoolService;
use App\Http\Requests\AddChildRequest;
use Illuminate\Support\Facades\Config;
use App\Providers\RouteServiceProvider;
use Shankl\Helpers\Event;
use Shankl\Interfaces\ChildRepoInterface;
use Shankl\Interfaces\GradeRepoInterface;
use Shankl\Repositories\ParentRepository;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Interfaces\EduSystemRepoInterface;
use Shankl\Services\AdminService;

class ParentController extends Controller
{
  use Searchable;
  private $changePassObj, $adminService;

  public function __construct(ChangePassword $changePass, AdminService $adminService)
  {
    $this->changePassObj = $changePass;
    $this->adminService = $adminService;
  }
  public function showRegister(LocationRepoInterface $locationRepo)
  {

    $data['cities'] =  $locationRepo->getCities();

    return view("web.Auth.Parent.parentRegister")->with($data);
  }

  public function addChild($parentId, ParentRepository $parentRepo, GradeRepoInterface $gradeRepo)
  {

    $currParent = $parentRepo->find($parentId);
    $grades = $gradeRepo->getGrades();

    return view('web.Auth.Parent.add-child')->with([
      'parent_id' => $currParent->id,
      'grades' => $grades
    ]);
  }

  public function showAddChild($parentId, ParentRepository $parentRepo, GradeRepoInterface $gradeRepo)
  {
    $currParent = $parentRepo->find($parentId);
    $grades = $gradeRepo->getGrades();

    return view('web.Parents.add-child')->with([
      'parent_id' => $currParent->id,
      'grades' => $grades
    ]);
  }

  public function getParentAdmin($id)
  {

    return view("admin.parents.details")->with(['id' => $id]);
  }

  public function createChild(AddChildRequest $request, ParentService $parentService)
  {

    $parentService->addChild($request);


    return redirect()->route('parent');
  }


  public function InsertChild(AddChildRequest $request, ParentService $parentService)
  {

    $parentService->addChild($request);

    toastr("child added successfully", "success");
    return redirect()->route('parent-profile');
  }

  public function parent(LocationRepoInterface $locationRepo, GradeRepoInterface $gradeRepo, EduSystemRepoInterface $eduSystems)
  {
    $data['Areas'] = $locationRepo->getAreas();
    $data['Grades'] = $gradeRepo->getGrades();
    $data['Esystems'] = $eduSystems->getEduSystems();
    $sliders = $this->adminService->getSliders();
    if (count($sliders) == 0) {
      $data['slider'] = collect()->pop();
    } else {
      $data['slider'] = $sliders->random();
    }
    return view('web.Parents.profile')->with($data);
  }


  public function showLogin()
  {
    return view('web.Auth.Parent.parentLogin');
  }

  public function showProfile(ParentRepository $parentRepository, GradeRepoInterface $gradeRepo)
  {
    $parent = $parentRepository->ParentChilds();
    $grades = $gradeRepo->getGrades();
    $children = $parent->children;
    return view("web.Parents.editProfile")->with([
      'children' => $children,
      'grades' => $grades
    ]);
  }

  public function changePassView()
  {
    return view("web.Auth.Parent.Change_Pass");
  }

  public function changePass(Request $request, $guard)
  {
    $result = $this->changePassObj->changePass($request, $guard);

    if ($result == false) {
      return back()->with('error', "old password doesn't match");
    }
    $url =  Config::get('auth.custom.' . $guard . ".url");

    toastr("password changed sucessfully", "success");

    return redirect()->route($url);
  }


  public function showRegisterForm($schoolid, SchoolService $schoolService, ParentService $parentService)
  {
    $School = $schoolService->getSchoolGrades($schoolid);

    if (!$School) {
      return back();
    }

    $Parent = $parentService->Children();

    if (!$Parent) {
      return back();
    }

    return view('web.Schools.schoolRegister')->with(['School' => $School, 'Parent' => $Parent]);
  }

  public function FilterSchools(Request $request)
  {
    $query = School::query();
    $Schools =  $this->search($request->query(), $query);

    return view("web.Schools.filteredSchools")->with(['Schools' => $Schools]);
  }


  public function FilterSuppliers(Request $request)
  {
    $query = Supplier::query();
    $Suppliers =  $this->search($request->query(), $query);

    return view("web.Suppliers.filteredSuppliers")->with(['Suppliers' => $Suppliers]);
  }

  public function areaSchools(){
    return view("web.Parents.areaSchools");
  }

  public function reservedEvents(Event $EventObj){
    $Events = $EventObj->UserReservedEvents(5);
    return view("web.events.ReservedEvents")->with(['Events' => $Events]);
  }

  public function reservedSchools(){
    return view("web.Parents.reservedSchools");
  }

  public function reservedTeachers(){
    return view("web.Parents.reservedTeachers");
  }
}
