<?php

namespace App\Http\Livewire\Web\Schools;


use Livewire\Component;
use Shankl\Helpers\Event AS HelpersEvent;
use Livewire\WithPagination;
use Shankl\Factories\AuthUserFactory;

class SchoolEvents extends Component
{

   
    use WithPagination;

    public $EventsPagin;
    public function render()
    {
       
        if ( ! is_array($this->EventsPagin)) {
            $this->EventsPagin = $this->EventsPagin->items();  
        }
           

        return view('livewire.web.schools.school-events')->with(['Events' => $this->EventsPagin]);
    }



    public function cancelEvent($event , HelpersEvent $EventObj){
        

        $EventObj->cancelEvent($event['id']);
        toastr("Event cancelled successfully", "success");
    


   }
    
     


}
