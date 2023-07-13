<?php

namespace App\Http\Livewire\Web\Events;

use App\Models\Event;
use App\Notifications\EventSeatBooked;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Shankl\Factories\AuthUserFactory;
use Shankl\Helpers\Event as HelpersEvent;
use Shankl\Interfaces\EventRepoInterface;

class Events extends Component
{

    use WithPagination;

    protected $listener = [
        'fresh' => '$refresh',
    ];
    public function render(EventRepoInterface $eventRepo)
    {
        $userid  = AuthUserFactory::getAuthUserId();
        $guard = AuthUserFactory::geGuard();
        $FilteredEvents = $eventRepo->getEventsWeb($userid, $guard);

        if ($FilteredEvents == null) {
            $Events = $eventRepo->getEventsguest(5);
        } else {
            $Events = Event::paginate($FilteredEvents, 5);
        }

        return view('livewire.web.events.events')->with(['Events' => $Events]);
    }

    public function mount()
    {
    }


    public function paginationView()
    {
        return 'livewire.web-pagination';
    }

    public function BookAseat($event, HelpersEvent $Event)
    {

        

        if ($Event->bookSeat($event['id'])) {

            toastr("Booked successfully", "success");

         

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

            $this->emit('fresh');
        } else {

            toastr("Error happened ..!", "error");
            $this->emit('fresh');
        }
    }
}
