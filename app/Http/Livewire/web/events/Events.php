<?php

namespace App\Http\Livewire\Web\Events;

use App\Models\Event;
use App\Notifications\EventSeatBooked;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Shankl\Factories\AuthUserFactory;
use Shankl\Interfaces\EventRepoInterface;

class Events extends Component
{
    
    use WithPagination;


    public function render(EventRepoInterface $eventRepo)
    {
         $userid  =AuthUserFactory::getAuthUser()->id;
        $FilteredEvents = $eventRepo->getEventsWeb($userid);
          $Events = Event::paginate($FilteredEvents , 5);
        return view('livewire.web.events.events')->with(['Events' => $Events]);
    }

    public function mount()
    {
       
      
    }


    public function paginationView()
    {
        return 'livewire.web-pagination';
    }

    public function BookAseat($event , EventRepoInterface $eventRepo){
         
       $User =  AuthUserFactory::getAuthUser();
      $action =  $eventRepo->subscribeUser($event['id'] , $User);

        if ($action) {
             
            toastr("Booked successfully" , "success");

            Notification::send($User , new EventSeatBooked($User , $event));

        }else{

            toastr("Error happened ..!" , "error");
        }
        
    }
}
