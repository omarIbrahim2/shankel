<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SchoolService;

class Schools extends Component
{
    use WithPagination;
    public $active;
    public $guard = "school";
    public function render(SchoolService $schoolService)
    {

        if ($this->active == true) {
             $Users =$schoolService->getActiveSchools(10);
        }else{

            $Users =$schoolService->getUnActiveSchools(10);
        }

        return view('livewire.admin.schools')->with(['Users' => $Users]);
    }


    public function Activate( SchoolService $schoolService , $userId){
           
          $school =  $schoolService->getSchool($userId);


          $schoolService->ActivateUserAccount($school , "school-login");


          toastr("User Activated successfully" , "success" , "Activation");


    }


    public function Deactivate(SchoolService $schoolService , $userId){

          $school =    $school =  $schoolService->getSchool($userId);

           $schoolService->DeactivateUserAcount($school);
    }



    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
