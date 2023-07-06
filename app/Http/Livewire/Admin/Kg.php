<?php

namespace App\Http\Livewire\Admin;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SchoolService;
use App\Http\Livewire\Traits\SearchTrait;

class Kg extends Component
{
    use WithPagination , SearchTrait;
    public $active;
    public $guard = "school";
    public $NameOrEmail;
    public function render(SchoolService $schoolService)
    {
        $query = (new School)->query();

        if ($this->active == true) {
             $Users =$schoolService->getKGs(10);
        }else{

            $Users =$schoolService->getUnActKGs(10);
        }

        if ($this->NameOrEmail) {
            $Users = $this->NameOrEmailSearch($this->NameOrEmail , ['name' => 'name' , 'email'=> 'email'] ,$this->active , $query );
         }
        return view('livewire.admin.kg')->with(['Users' => $Users]);
    }

       
    public function Activate( SchoolService $schoolService , $userId){
           
        $school =  $schoolService->getSchool($userId);
        $schoolService->ActivateUserAccount($school , "school-login");
        toastr("User Activated successfully" , "success" , "Activation");
    }


    public function Deactivate(SchoolService $schoolService , $userId){
        $school =  $schoolService->getSchool($userId);
        $schoolService->DeactivateUserAcount($school);
    }



    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
