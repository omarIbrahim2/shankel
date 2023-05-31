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

    protected $listener = [
        'fresh' => '$refresh',
    ];
    public function render(EventRepoInterface $eventRepo)
    {
         $userid  =AuthUserFactory::getAuthUserId();
         $guard = AuthUserFactory::geGuard();


        $FilteredEvents = $eventRepo->getEventsWeb($userid , $guard);
        
           
        if ($FilteredEvents == null) {
          $Events = $eventRepo->getEvents(5);
        }else{
          
            $Events = Event::paginate($FilteredEvents , 5);
            
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

    public function BookAseat($event , EventRepoInterface $eventRepo){
         
       $User =  AuthUserFactory::getAuthUser();
      $action =  $eventRepo->subscribeUser($event['id'] , $User);

        if ($action) {
             
            toastr("Booked successfully" , "success");

            Notification::send($User , new EventSeatBooked($User , $event));

            $this->emit('fresh');

        }else{

            toastr("Error happened ..!" , "error");
        }
      
        
    }

    public function cancelBooking($event , EventRepoInterface $eventRepo){
        $User =  AuthUserFactory::getAuthUser();

          $action = $eventRepo->cancelSubscribeUser($event['id'] , $User);

          if ($action) {
             
            toastr("Booking cancelled successfully" , "success");

            $this->emit('fresh');

        }else{

            toastr("Error happened ..!" , "error");
        }

          
    }
}
