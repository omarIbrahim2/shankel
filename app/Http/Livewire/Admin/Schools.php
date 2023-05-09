<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\SearchTrait;
use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SchoolService;

class Schools extends Component
{
    use WithPagination;
    public $active;
    public $guard = "school";
    public $NameOrEmail;

    use SearchTrait;
    public function render(SchoolService $schoolService)
    {
        $query = (new School)->query();

        if ($this->active == true) {
             $Users =$schoolService->getActiveSchools(10);
        }else{

            $Users =$schoolService->getUnActiveSchools(10);
        }

        if ($this->NameOrEmail) {
            $Users = $this->NameOrEmailSearch($this->NameOrEmail , ['name' => 'name' , 'email'=> 'email'] ,$this->active , $query );
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
