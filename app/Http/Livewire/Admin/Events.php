<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;
use Shankl\Services\AdminService;

class Events extends Component
{
    public $events;

    protected $adminService;
    public function render()
    {
        return view('livewire.admin.events');
    }

    public function mount(AdminService $adminService){
         
        $this->adminService = $adminService;

       $this->events = $this->getEvents();

       

    }

    public function getEvents(){
           
       return  $this->adminService->getEvents();

    }
}
