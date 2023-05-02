<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventValidationRequest;
use App\Http\Requests\EventValidationUpdateReq;
use App\Models\User;
use Illuminate\Http\Request;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Services\AdminService;
use Shankl\Services\FileService;

class AdminController extends Controller
{
    private $AdminService;
    public function __construct(AdminService $AdminService)
    {
        $this->AdminService = $AdminService;
        
    }
    public function showLogin(){

        return view("web.Auth.Admin.adminLogin");
    }


    public function dashboard(){

        return view("admin.index");
    }

    public function Events(){

        return view('admin.events.events');
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
       
       $validatedData = $request->validated();
      
       $validatedData["eventable_type"] = User::class;

       $validatedData["eventable_id"] =  auth()->guard("web")->user()->id;
        

       $fileService->setPath('events');

       $fileService->setFile($request->image);

       $validatedData['image'] = $fileService->uploadFile();


         $event =$this->AdminService->addEvent($validatedData);

         if ($event) {
            toastr("event created successfully" , "success");
            return redirect()->route("admin-events");
         }

         toastr("error in creation " , "error" , "Error");
         return redirect()->route("admin-events");



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
}
