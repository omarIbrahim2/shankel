<?php

namespace App\Http\Livewire\Admin;

use App\Models\Parentt;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\ParentService;
use App\Http\Livewire\Traits\SearchTrait;

class Parents extends Component
{
    use WithPagination;
    public $active;
    public $guard = "parent";

    public $NameOrEmail;

    use SearchTrait;
    public function render(ParentService $parentService)
    {
        $query = (new Parentt())->query(); 
        
        if ($this->active == true) {
            $Users = $parentService->getActiveParent(10);
        }else{

            $Users = $parentService->getUnActiveParents(10);
        }

         if ($this->NameOrEmail) {
            $Users = $this->NameOrEmailSearch($this->NameOrEmail , ['name' => 'name' , 'email'=> 'email'] ,$this->active , $query );
         }
       
    
        return view('livewire.admin.parents')->with(['Users' => $Users]);
    }

    public function Activate( parentService $parentService , $userId){
           
        $parent =  $parentService->getparent($userId);


        $parentService->ActivateUserAccount($parent , "parent-login");


        toastr("User Activated successfully" , "success" , "Activation");


  }


  public function Deactivate(parentService $parentService , $userId){

        $parent =  $parentService->getparent($userId);

         $parentService->DeactivateUserAcount($parent);
  }



    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
