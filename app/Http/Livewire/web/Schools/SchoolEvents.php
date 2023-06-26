<?php

namespace App\Http\Livewire\Web\Schools;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Factories\AuthUserFactory;
use Shankl\Interfaces\EventRepoInterface;

class SchoolEvents extends Component
{
    use WithPagination;
    public function render()
    {
        $schoolId  = AuthUserFactory::getAuthUserId();
        $Events = Event::with('area.city')->where('eventable_type','App\Models\School')
        ->where('eventable_id', $schoolId)->orderBy('start_date', 'DESC')->paginate();
        return view('livewire.web.schools.school-events')->with(['Events' => $Events ]);
    }

    public function cancelEvent($eventId , EventRepoInterface $eventRepo) {

        $event =$eventRepo->find($eventId);
        toastr("Event Cancelled Successfully", 'warning');
        return $event->update([
            'status' => "Cancelled"
        ]);
     }
    
     public function reEvent($eventId , EventRepoInterface $eventRepo) {
    
        $event =$eventRepo->find($eventId);
        toastr("Event in Progress", 'success');
        return $event->update([
            'status' => "in Progress"
        ]);
     }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
