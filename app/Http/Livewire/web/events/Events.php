<?php

namespace App\Http\Livewire\Web\Events;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Helpers\Event as HelpersEvent;


class Events extends Component
{

    use WithPagination;

    public $event;
     public $booked;
    protected $listener = [
        'fresh' => '$refresh',
    ];
    public function render()
    {

        return view('livewire.web.events.events')->with(['event' => $this->event]);
    }

    public function mount()
    {
   
    }


  

    public function BookAseat($event, HelpersEvent $Event)
    {

        

        if ($Event->bookSeat($event['id'])) {

            toastr("Booked successfully", "success");

            $this->booked = true; 

            $this->emit('fresh');
        } else {

            toastr("Error happened ..!", "error");
            $this->emit('fresh');
        }
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
