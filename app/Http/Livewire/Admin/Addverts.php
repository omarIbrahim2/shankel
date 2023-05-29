<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\AdminService;
use App\Http\Livewire\Traits\SearchTrait;
use App\Models\Addvert;

class Addverts extends Component
{
    use WithPagination;
    protected $adminService;
    public $searchAddvert;

    use SearchTrait;

    public function render(AdminService $adminService)
    {
        $addvertQuery = (new Addvert)->query();
        if ($this->searchAddvert) {
             $addverts = $this->TitleSearch($this->searchAddvert , 'title' , $addvertQuery);
        }else{
            $addverts =  $adminService->getAddverts(10);
            
        }
        return view('livewire.admin.addverts')->with(['addverts' => $addverts]);
    }

    public function getAddverts(){
           
        return  $this->adminService->getAddverts(10);
 
     }
 
     public function paginationView()
     {
         return 'livewire.admin-pagination';
     }
}
