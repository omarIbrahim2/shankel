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

    public function deleteService($serviceId){

         $action = $this->supplierService->deleteService($serviceId);

         if ($action) {
             
            toastr("Deleted successfully" , "error" , "Deleting");

            return back();
         }

         toastr("error in deleting" , "error");

         return back();

    }

    public function serviceCreateView($supplierId){

        return view("admin.services.create")->with(["supplierId" => $supplierId]);
    }

    public function serviceUpdateView($serviceId){
         $Service = $this->supplierService->getService($serviceId);
         
        return view("admin.services.update")->with(['Service' => $Service]);
    }

    public function CreateService(ServiceAddReq $request , FileService $fileService){

        $validatedreq =  $request->validated();

        $data = $this->credientials($validatedreq , ['image']);


        if ($request->has('image')) {
        
            $fileService->setPath('services');
    
            $fileService->setFile($request->image);
            
             
            $data['image'] = $fileService->uploadFile();
          }

          $service = $this->supplierService->CreateService($data);

          if ($service) {
             toastr("service created successfully" , "success");

             return redirect()->route("Services" , $data['supplier_id']);
          }

          toastr("error in creating" , "error");

          return redirect()->route("Services" , $data['supplier_id']);

        
    }

    public function UpdateService(ServiceUpdateReq $request , SupplierService $supplierService){
            
          $validatedReq = $request->validated();

          $data = $this->credientials($validatedReq , ['image']);

          $serviceCurrentImage = $supplierService->getService($data['id'])->image;

          $image = $supplierService->uploadServiceImage($request->image ,$serviceCurrentImage );
          
            if($image != null){

                $data['image'] = $image;
            }


            $action = $supplierService->updateService($data);
           
            if ($action) {
            
                toastr("service updated successfully" , "info" , "Service update");
    
                return redirect()->route('dashboard');
            }
    
            toastr("something wrong happened" , "error" , "Service update");
            return redirect()->back();
            
          
    }

    private function credientials($validatedReq , $vals){

        return Arr::except($validatedReq ,$vals);
    }
}
