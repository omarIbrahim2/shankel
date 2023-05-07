<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\ParentService;

class Parents extends Component
{
    use WithPagination;
    public $active;
    public $guard = "parent";
    public function render(ParentService $parentService)
    {

        if ($this->active == true) {
            $Users = $parentService->getActiveParent(10);
        }else{

            $Users = $parentService->getUnActiveParents(10);
        }
       
        
        
    
         
     
        return view('livewire.admin.parents')->with(['Users' => $Users]);
    }



    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
