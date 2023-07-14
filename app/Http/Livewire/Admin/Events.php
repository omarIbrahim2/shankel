<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\SearchTrait;
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
    public $searchEvent;

    use SearchTrait;
    public function render(AdminService $adminService)
    {

         $eventQuery = (new Event)->query();
        if ($this->searchEvent) {
             $Events = $this->TitleSearch($this->searchEvent , 'title' , $eventQuery);
        }else{
            $Events =  $adminService->getEvents(10);
        }
       
        
        

        return view('livewire.admin.events')->with(['events' => $Events]);
    }

    public function mount(AdminService $adminService){
         
        $this->adminService = $adminService;
        
    }

    public function getEvents(){
           
       return  $this->adminService->getEvents(10);

    }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }

}
