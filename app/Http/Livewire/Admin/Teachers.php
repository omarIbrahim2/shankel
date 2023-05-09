<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\TeacherService;

class Teachers extends Component
{
    use WithPagination;
    public $active;
    public $guard = "teacher";
    public function render(TeacherService $teacherService)
    {
        if ($this->active == true) {
            $Users =$teacherService->getActiveTeachers(10);
       }else{

           $Users =$teacherService->getUnActiveTeachers(10);
       }

    
        return view('livewire.admin.teachers')->with(['Users' => $Users]);
    }


    public function Activate( TeacherService $teacherService , $userId){
           
        $teacher =  $teacherService->getTeacher($userId);


        $teacherService->ActivateUserAccount($teacher , "teacher-login");


        toastr("User Activated successfully" , "success" , "Activation");


  }


  public function Deactivate(TeacherService $teacherService , $userId){

        $teacher =  $teacherService->getTeacher($userId);

         $teacherService->DeactivateUserAcount($teacher);
  }



    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
