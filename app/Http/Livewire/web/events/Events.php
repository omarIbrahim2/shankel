<?php

namespace App\Http\Livewire\Web\Events;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Interfaces\EventRepoInterface;

class Events extends Component
{
    
    use WithPagination;


    public function render(EventRepoInterface $eventRepo)
    {
        $Events = $eventRepo->getEvents(5);
        return view('livewire.web.events.events')->with(['Events' => $Events]);
    }

    public function mount()
    {
    
    }


    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
