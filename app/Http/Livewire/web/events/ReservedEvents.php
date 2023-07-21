<?php

namespace App\Http\Livewire\Web\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Factories\AuthUserFactory;
use Shankl\Helpers\Event as HelpersEvent;
use Shankl\Interfaces\EventRepoInterface;

class ReservedEvents extends Component
{
    use WithPagination;
    protected $listener = ['fresh' => '$refresh',];

    public $event;

    public $booked;

    public function render()
    {
        return view('livewire.web.events.reserved-events')->with(['event' => $this->event]);
    }


    
    public function mount(){

        $this->booked =  $this->event->booked;
    }

    




  

    public function cancelBooking($event, HelpersEvent $Event)
    {
        

        if ($Event->cancelBooking($event['id'])) {

            toastr("Booking cancelled successfully", "success");
            
            $this->booked = false;
           
            $this->emit('fresh');
        } else {

            toastr("Error happened ..!", "error");
            $this->emit('fresh');
        }
    }
}
