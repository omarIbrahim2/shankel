<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Shankl\Services\FileService;
use Shankl\Services\AdminService;
use Shankl\Helpers\ChangePassword;
use App\Http\Requests\ServiceAddReq;
use App\Http\Requests\SocialsAddReq;
use Shankl\Services\SupplierService;
use Shankl\Factories\AuthUserFactory;
use App\Http\Requests\SocialUpdateReq;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\ServiceUpdateReq;

use App\Http\Requests\SupplierUpdateReq;
use Shankl\Interfaces\LocationRepoInterface;
use App\Http\Requests\EventValidationRequest;
use App\Http\Requests\EventValidationUpdateReq;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    private $AdminService;
    private $supplierService;
    private $changePassObj;
    public function __construct(AdminService $AdminService , SupplierService $supplierService , ChangePassword $changePass)
    {
        $this->AdminService = $AdminService;
        $this->supplierService = $supplierService;
        $this->changePassObj = $changePass;
        
    }
    public function showLogin(){

        return view("web.Auth.Admin.adminLogin");
    }

    public function Profile(){
           
        if (Gate::allows("superAdminProfile")) {
            $AuthUser = AuthUserFactory::getAuthUser();

       
            return view('admin.profile.profile')->with(['AuthUser' => $AuthUser]);
        }else{

            toastr("you are not allowed to access" , 'error' , 'permission');
            return back();
        }
        
    
    }

    public function updateProfile(Request $request){
        
        if (Gate::allows("superAdminProfile")) {
            $validatedData = $request->validate([
                'id' => 'required|exists:users,id',
               'email' => ["required","email" , Rule::unique("users")->ignore($request->id) ],
           ]);
     
            
   
           $action= $this->AdminService->updateProfile($validatedData);
   
           if ($action) {
           
               toastr("data updated successfully" , "success");
               return back();
           };
           toastr("error in updating" , "error");
           return back();
        }else{

            toastr("you are not allowed to access" , 'error' , 'permission');
            return back();
        }
    


    }

    public function changePassView(){

        return view('admin.profile.changePass');
    }

    public function changePass(Request $request , $guard){

        $result = $this->changePassObj->changePass($request , $guard);

        if ($result == false) {
          return back()->with('error' , "old password doesn't match");
        }
       $url =  Config::get('auth.custom.' . $guard . ".url");

       toastr("password changed sucessfully" , "success");
      
        return redirect()->route($url);
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

    public function Centers($status){

        $possibleStates = ['active'=> 'active' , 'unactive' => 'unactive'];

        if (! array_key_exists($status , $possibleStates)) {
             
            return back();
        }

        $value = $status == "active"?true :false;

        return view("admin.schools.centers")->with([
            "active" => $value,
        ]);
    }

    public function Kg($status){

        $possibleStates = ['active'=> 'active' , 'unactive' => 'unactive'];

        if (! array_key_exists($status , $possibleStates)) {
             
            return back();
        }

        $value = $status == "active"?true :false;

        return view("admin.schools.kg")->with([
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

    
    private function evaluateSocialData($request)
    {
        $data = array();
        if (array_key_exists('id', $request)) {

            $data['id'] = $request['id'];
        }
        $data['address'] = json_encode([
            'en' => $request['address_en'],
            'ar' => $request['address_ar'],
        ]);
        return $data;
    }

    public function socialCreate(SocialsAddReq $request){

       $validatedData =  $request->validated();
       $data = $this->evaluateSocialData($validatedData);

       $social = $this->AdminService->AddSocial($data);

       if ($social) {
          toastr("social created successfully" , 'success');
          return redirect()->route("Socials");
       }

       toastr("error in creating" , "error");
    }

    public function SocialUpdate(SocialUpdateReq $request){
          
       $validatedData =  $request->validated();
       $data = $this->evaluateSocialData($validatedData);

       $action = $this->AdminService->UpdateSocial($data , $data['id']);
         
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
