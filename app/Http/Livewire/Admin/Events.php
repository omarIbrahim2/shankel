<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\AdminService;

class Events extends Component
{
    
    // public $Events;
    // public $PaginEvents;
    use WithPagination;
    protected $adminService;
    public function render(AdminService $adminService)
    {
       
        $Events =  $adminService->getEvents(10);
        

        return view('livewire.admin.events')->with(['events' => $Events]);
    }

    public function mount(AdminService $adminService){
         
        $this->adminService = $adminService;
         
      
    
        // $this->Events =$this->getEvents();  
       
        // $this->PaginEvents = $this->Events;
        // $this->Events = collect($this->Events->items());
        
    }

    public function getEvents(){
           
       return  $this->adminService->getEvents(10);

    }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }

}
