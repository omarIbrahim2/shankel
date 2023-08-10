<?php

namespace App\Http\Controllers;

use Shankl\Helpers\Event;
use App\Models\Event as EventModel;
use App\Traits\HandleUpload;
use Illuminate\Http\Request;
use App\Jobs\CancelSubscribtion;
use Shankl\Services\FileService;
use Shankl\Services\AdminService;
use Shankl\Interfaces\EventRepoInterface;
use Shankl\Interfaces\LocationRepoInterface;
use App\Http\Requests\EventValidationRequest;
use App\Http\Requests\EventValidationUpdateReq;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;
use Shankl\Factories\AuthUserFactory;

class EventsController extends Controller
{
    private $eventRepo;
    private $AdminService , $Eventobj;
    use HandleUpload;
    public function __construct(EventRepoInterface $eventRepo , AdminService $AdminService , Event $EventObj)
    {
        $this->eventRepo = $eventRepo;
        $this->AdminService = $AdminService;
        $this->Eventobj = $EventObj;
    }


    public function index(){
        $userid  = AuthUserFactory::getAuthUserId();
        $guard = AuthUserFactory::geGuard();
        $FilteredEvents = $this->eventRepo->getEventsWeb($userid, $guard);

        if ($FilteredEvents == null) {
            $Events = $this->eventRepo->getEventsguest(10);
        } else {
            $Events = EventModel::paginate($FilteredEvents, 10);
        }

        return view("web.events.events")->with(['Events' => $Events ]);
    }

    public function showEvent($eventId){            
        $event = $this->eventRepo->find($eventId);
    }


    public function createEventView(LocationRepoInterface $locationRepo)
    {

        $data['cities'] = $locationRepo->getCities();
        return view("admin.events.createEvent")->with($data);
    }


   


    public function updateEventView(LocationRepoInterface $locationRepo ,$Eventid){
        $cities= $locationRepo->getCities();
        $event = $this->Eventobj->getEvent($Eventid);
        
        if (AuthUserFactory::geGuard() == 'web') {
            return view('admin.events.updateEvent')->with(['Event' => $event , 'cities' => $cities]);
        }
        
        return view("web.schools.editEvent")->with(['Event' => $event , 'cities' => $cities]);
        
       
        
    }

    public function storeEvent(EventValidationRequest $request , FileService $fileService){
     
        $validatedData = $request->validated();
         

        $this->Eventobj->setRequest($request);


      $data = $this->evaluateData($validatedData);

    
    
      return  $this->Eventobj->Add($data);
    }

    public function Events($guard){

        $guards = [
            'web' => User::class,
            'school' => School::class,
        ];

        if (! array_key_exists($guard , $guards)) {
            return back();
        }



        return view('admin.events.events')->with(['guard' => $guards[$guard]]);
    }

    private function evaluateData($request){
        
         $data = array();

          if (isset($request['image'])) {
              $data['image'] = $request['image'];
          }

          if (isset($request['id'])) {
             $data['id'] = $request['id'];
          }


          $data['title'] = json_encode([
               'en' => $request["title_en"],
               'ar' => $request["title_ar"],  
          ]); 


          $data['desc'] = json_encode([
             'en' => $request["desc_en"],
             'ar' => $request["desc_ar"],
          ]);


        $data['start_date'] = $request['start_date'];

        $data['end_date'] = $request['end_date'];

        $data['start_time'] = $request['start_time'];

        $data['end_time'] = $request['end_time'];

        $data['area_id'] = $request['area_id'];

        return $data;
    }


    public function updateEvent( EventValidationUpdateReq $request){
        $validatedData = $request->validated();
           
      
          $data = $this->evaluateData($validatedData);


          $this->Eventobj->setRequest($request);

         
         return $this->Eventobj->update($data);
            
    }


   

   
}
