<?php

namespace App\Http\Controllers;

use Shankl\Helpers\Event;
use App\Traits\HandleUpload;
use Illuminate\Http\Request;
use App\Jobs\CancelSubscribtion;
use Shankl\Services\FileService;
use Shankl\Services\AdminService;
use Shankl\Interfaces\EventRepoInterface;
use Shankl\Interfaces\LocationRepoInterface;
use App\Http\Requests\EventValidationRequest;
use App\Http\Requests\EventValidationUpdateReq;
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
            $Events = $this->eventRepo->getEventsguest(2);
        } else {
            $Events = Event::paginate($FilteredEvents, 2);
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
        
        return view("web.Schools.editEvent")->with(['Event' => $event , 'cities' => $cities]);
        
       
        
    }

    public function storeEvent(EventValidationRequest $request , FileService $fileService){
     
        $validatedData = $request->validated();
         

        $this->Eventobj->setRequest($request);


      $data = $this->evaluateData($validatedData);

    
    
      return  $this->Eventobj->Add($data);
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


   

    


    public function cancelEvent(Request $request){
          
      $validatedData =  $request->validate([
            'id' => 'required|exists:events,id',
            'status' => 'required'
      ]);

    
        $this->Eventobj->cancelEvent($validatedData['id']);

        
      toastr("event cancelled successfully" , "success");
      return back();
      
    }

   
}
