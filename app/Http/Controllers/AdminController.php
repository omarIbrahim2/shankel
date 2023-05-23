<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Shankl\Services\FileService;
use Shankl\Services\AdminService;
use Shankl\Services\SupplierService;
use App\Http\Requests\SupplierUpdateReq;
use Shankl\Interfaces\LocationRepoInterface;
use App\Http\Requests\EventValidationRequest;
use App\Http\Requests\EventValidationUpdateReq;
use App\Http\Requests\ServiceAddReq;
use App\Http\Requests\ServiceUpdateReq;
use App\Http\Requests\SocialsAddReq;
use App\Http\Requests\SocialUpdateReq;
use App\Models\Message;

class AdminController extends Controller
{
    private $AdminService;
    private $supplierService;
    public function __construct(AdminService $AdminService , SupplierService $supplierService)
    {
        $this->AdminService = $AdminService;
        $this->supplierService = $supplierService;
        
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

    public function Parentts($status){
        
        $possibleStates = ['active'=> 'active' , 'unactive' => 'unactive'];

        if (! array_key_exists($status , $possibleStates)) {
             
            return back();
        }

        $value = $status == "active"?true :false;

        return view("admin.parents.parents")->with([
            "active" => $value,
        ]);

    }


    public function Schools($status){

        $possibleStates = ['active'=> 'active' , 'unactive' => 'unactive'];

        if (! array_key_exists($status , $possibleStates)) {
             
            return back();
        }

        $value = $status == "active"?true :false;

        return view("admin.schools.schools")->with([
            "active" => $value,
        ]);
    }

    public function Teachers($status){
        $possibleStates = ['active'=> 'active' , 'unactive' => 'unactive'];

        if (! array_key_exists($status , $possibleStates)) {
             
            return back();
        }

        $value = $status == "active"?true :false;

        return view("admin.teachers.teachers")->with([
            "active" => $value,
        ]);

    }

    public function Suppliers($status){
        $possibleStates = ['active'=> 'active' , 'unactive' => 'unactive'];

        if (! array_key_exists($status , $possibleStates)) {
             
            return back();
        }

        $value = $status == "active"?true :false;

        return view("admin.suppliers.suppliers")->with([
            "active" => $value,
        ]);

    }

    public function createEventView(LocationRepoInterface $locationRepo)
    {

        $data['cities'] = $locationRepo->getCities();

        return view("admin.events.createEvent")->with($data);
    }

    public function createSupplierView(LocationRepoInterface $locationRepo){

        $data['cities'] = $locationRepo->getCities();

        return view('admin.suppliers.create')->with($data);
    }

    public function updateSupplierView(LocationRepoInterface $locationRepo ,$Supplier_id){
          
        $cities= $locationRepo->getCities();

        $supplier = $this->supplierService->getSupplier($Supplier_id);

        if(! $supplier){

            return redirect()->back();
        }

        return view('admin.suppliers.update')->with(['Supplier' => $supplier , 'cities' => $cities]);


    }


    public function updateSupplier(SupplierUpdateReq $request , SupplierService $supplierService){


         $validatedreq = $request->validated();
         
         $data = Arr::except($validatedreq , ['image']);
 
         $supplierCurrentImage = $supplierService->getSupplier($data['id'])->image;
         
           
        $image = $supplierService->handleUploadProfilepic($request->image , $supplierCurrentImage);
        
        if ($image != null) {
            $data['image'] = $image;
        }

        $action = $supplierService->updateProfile($data);


        if ($action) {
            toastr("data updated successfully" , "info" , "update");

            
        }else{
            toastr("problem in updating" , "error");
        }

        

        return redirect()->route("admin-suppliers" , "unactive");
        
    }

    public function deleteSupplier($Supplier_id , SupplierService $supplierService){
        
        try {
            $supplierService->deleteSupplier($Supplier_id);
             
            toastr("data deleted successfully" , "error" , "Delete");
            return back();

        } catch (\Throwable $th) {
             
            toastr("error in deletion , supplier might have services" , "error" , "Delete");
            return back();
        }

         
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
        
      if ($request->has('image')) {
        
        $fileService->setPath('events');

        $fileService->setFile($request->image);
 
        $validatedData['image'] = $fileService->uploadFile();
      }
     


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

    public function Services($supplierId){
         
        return view("admin.services.services")->with(["supplierId" => $supplierId]);     
    }

    public function Orders(){

        return view("admin.orders.orders");
    }

    public function Socials(){
        return view("admin.socials.socials");
    }

    public function socialsAddView(){

        return view("admin.socials.create");
    }

    public function socialUpdateView($socialId){
         
       
       $social = $this->AdminService->getSocial($socialId);     
        return view('admin.socials.update')->with([
            'Social' => $social,
        ]);
    }

    public function socialCreate(SocialsAddReq $request){

       $validatedData =  $request->validated();

       $social = $this->AdminService->AddSocial($validatedData);

       if ($social) {
          toastr("social created successfully" , 'success');
          return redirect()->route("Socials");
       }

       toastr("error in creating" , "error");
    }

    public function SocialUpdate(SocialUpdateReq $request){
          
       $validatedData =  $request->validated();

       $action = $this->AdminService->UpdateSocial($validatedData , $validatedData['id']);
         
       if ($action) {
          
           toastr("social updated successfully" , "success" ,"update socials");
           return redirect()->route("Socials");
       }

       toastr("error in updating" , "error");
    }

    public function SocialDelete($socialId){

        $action = $this->AdminService->deleteSocial($socialId);

        if ($action) {
            toastr("social deleted successfully" , "error" ,"delete socials");
            return redirect()->route("Socials");
        }

        toastr("error in deleting" , "error");
    }

    public function Messages(){
         
          return view("admin.messages.messages");
    }

    public function deleteMessage($messageId){

      $message =  Message::findOrFail($messageId);

      if ($message) {
        $action = $message->delete();

        if ($action) {
            toastr("message deleted successfully" , "error" ,"delete messages");

            return back();
            toastr("error in deleting" , "error");
        }


      }else{

        return back();
      }
    }

    public function showMessage($messageId){
        $message =  Message::findOrFail($messageId);
 
        if ($message) {
            return view('admin.messages.messageDetail')->with(['Message' => $message]);
        }

        return back();
       

    }


}
