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

    public function render(EventRepoInterface $eventRepo)
    {
        $userId  = AuthUserFactory::getAuthUserId();
        $guard = AuthUserFactory::geGuard();
        $FilteredEvents = $eventRepo->getReservedEvents($userId, $guard);
        $Events = Event::paginate($FilteredEvents, 5);
        
        return view('livewire.web.events.reserved-events')->with(['Events' => $Events]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
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
