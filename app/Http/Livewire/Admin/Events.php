<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\SearchTrait;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Helpers\Event as HelpersEvent;
use Shankl\Services\AdminService;

class Events extends Component
{
    
    // public $Events;
    // public $PaginEvents;
    use WithPagination;
    protected $adminService;
    public $searchEvent;

    public $guard;

    
    protected $listener = [
        'fresh' => '$refresh',
    ];
    use SearchTrait;
    public function render(HelpersEvent $EventObj)
    {

         $eventQuery = (new Event)->query();
        if ($this->searchEvent) {
             $Events = $this->TitleSearch($this->searchEvent , 'title' , $eventQuery);
        }else{
            $Events =  $EventObj->getEvents($this->guard , 10);
        }
       
        
        

        return view('livewire.admin.events')->with(['events' => $Events]);
    }

  
    public function cancelEvent($event , HelpersEvent $EventObj){
        

        $EventObj->cancelEvent($event['id']);
        toastr("Event cancelled successfully", "success");
        $this->emit('fresh');


   }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }

}
