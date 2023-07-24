<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\SearchTrait;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\TeacherService;

class Teachers extends Component
{
    use WithPagination;
    public $active;
    public $guard = "teacher";
    public $NameOrEmail;
    use SearchTrait;
    public function render(TeacherService $teacherService)
    {
        $query = (new Teacher)->query();
        if ($this->active == true) {
            $Users =$teacherService->getActiveTeachers(10);
       }else{

           $Users =$teacherService->getUnActiveTeachers(10);
       }

       if ($this->NameOrEmail) {
        $Users = $this->NameOrEmailSearch($this->NameOrEmail , ['name_en' => 'name->en' , 'name_ar' => 'name->ar' , 'email'=> 'email'] ,$this->active , $query );
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
