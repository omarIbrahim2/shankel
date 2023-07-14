<?php

namespace App\Http\Livewire\Web\Schools;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Factories\AuthUserFactory;

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
    
     

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
