<?php

namespace App\Http\Livewire\Web\Schools;

use App\Models\Event;
use Livewire\Component;
use Shankl\Helpers\Event AS HelpersEvent;
use Livewire\WithPagination;

class SchoolEvents extends Component
{

   
    use WithPagination;

    public $event;

    public $status;
    public function render()
    {
        
        return view('livewire.web.schools.school-events')->with(['event' => $this->event]);
    }


    public function mount (){
       
        $this->status = $this->event->status;
        
        
    }



    public function cancelEvent($event , HelpersEvent $EventObj){
        

        $EventObj->cancelEvent($event['id']);
       
    
     toastr("Event cancelled successfully", "success");
      $this->status = 'Cancelled';
     $this->emit('fresh');

   }
    
     


}
