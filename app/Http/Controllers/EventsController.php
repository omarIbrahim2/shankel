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
        return view("web.events.events");
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
        $event = $this->AdminService->getEvent($Eventid);
        if (! $event) {
            
            return redirect()->back();
        }
        
        return view('admin.events.updateEvent')->with(['Event' => $event , 'cities' => $cities]);
        
    }

    public function storeEvent(EventValidationRequest $request , FileService $fileService){
       
    //    $validatedData = $request->validated();
      
    //    $validatedData["eventable_type"] = User::class;

    //    $validatedData["eventable_id"] =  auth()->guard("web")->user()->id;
        
    //   if ($request->has('image')) {
        
    //     $fileService->setPath('events');

    //     $fileService->setFile($request->image);
 
    //     $validatedData['image'] = $fileService->uploadFile();
    //   }
     


    //      $event =$this->AdminService->addEvent($validatedData);

    //      if ($event) {
    //         toastr("event created successfully" , "success");
    //         return redirect()->route("admin-events");
    //      }

    //      toastr("error in creation " , "error" , "Error");
    //      return redirect()->route("admin-events");

     
        $validatedData = $request->validated();
     

         $validatedData['image'] = $this->handleUpload($request , $fileService , null , 'events');

        $event = $this->Eventobj->Add($validatedData);


        if ($event) {
            toastr('event created successfully' , 'success');

            return back();
        }


        
        
    }


    public function updateEvent( EventValidationUpdateReq $request , FileService $fileService){
        $validatedData = $request->validated();
           
        if ($request->hasFile('image')) {
            $event = $this->AdminService->getEvent($request->id);
            $fileService->DeleteFile($event->image);

            $fileService->setPath('events');

            $fileService->setFile($request->image);

            $validatedData['image'] = $fileService->uploadFile();

        }
        $validatedData["eventable_type"] = User::class;
        $validatedData["eventable_id"] =  auth()->guard("web")->user()->id;
        
        $action = $this->AdminService->updateEvent($validatedData);


        if ($action) {
            
            toastr("event updated successfully" , "info" , "Event update");

            return redirect()->route('admin-events');
        }

        toastr("something wrong happened" , "error" , "Event update");
        return redirect()->back();
    }


    private function getSubscribers($validatedData){
          
        $Parents = $this->eventRepo->eventSubscribers($validatedData['id'])->ParenttsinEvent->toArray();
        $Schools =  $this->eventRepo->eventSubscribers($validatedData['id'])->schoolsinEvent->toArray();
        $Teachers = $this->eventRepo->eventSubscribers($validatedData['id'])->teachersinEvent->toArray();
        $subscribers = array_merge($Parents , $Schools , $Teachers);

        return $subscribers;
          
    }

    


    public function cancelEvent(Request $request){
          
      $validatedData =  $request->validate([
            'id' => 'required|exists:events,id',
      ]);

    
        

          $this->eventRepo->updateEvent([
            'id' => $validatedData['id'],
             'status' => 'Cancelled',
         ]);


         $subscribers = $this->getSubscribers($validatedData);
          
         if (count($subscribers) > 0) {
            CancelSubscribtion::dispatch($subscribers)->onQueue('EventMailingQueue');
         } 
       
      toastr("event cancelled successfully" , "success");
      return back();
      
    }

   
}
