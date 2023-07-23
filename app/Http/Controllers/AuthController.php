<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Shankl\Services\AuthService;
use Shankl\Services\FileService;
use Shankl\Entities\ParentEntity;
use Shankl\Helpers\ForgotPassword;
use Shankl\Helpers\ResetPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SupplierAddReq;
use Shankl\Factories\EntitiesFactory;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Config;
use App\Providers\RouteServiceProvider;
use Shankl\Adapters\FileServiceAdapter;
use App\Http\Requests\ParentRegisterReq;
use App\Http\Requests\SchoolRegisterReq;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\TeacherRegisterReq;
use Illuminate\Auth\Events\PasswordReset;
use Shankl\Repositories\ParentRepository;
use Shankl\Repositories\SchoolRepository;
use App\Http\Requests\SupplierRegisterReq;
use App\Traits\HandleResponseSupplier;
use Shankl\Repositories\TeacherRepository;
use Shankl\Repositories\SupplierRepository;
use Illuminate\Routing\RoutingServiceProvider;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    use HandleResponseSupplier;
       
    private AuthService  $authService;

    private  $fileser;
    public function __construct(AuthService $authService, FileService $fileser)
    {
        $this->authService = $authService;

        $this->fileser = $fileser;
    }


    //parent Authentecation

    public function Parentregister(ParentRegisterReq $request, ParentRepository $parentRepo)
    {

        $validatedReq = $request->validated();


        $parentObj =  EntitiesFactory::createEntity( Arr::except($validatedReq , ['image']) , 'parent');

        $parentObj->changeStatus();
       
        $parentObj->UploadImage($this->fileser , $request);

        $authParent = $this->authService->RegisterUser($parentRepo, $parentObj);

        Auth::guard('parent')->login($authParent);

        $request->session()->regenerate();


        

        return redirect()->route('add-child', $authParent->id);
    }



    public function parentLogin(Request $request)
    {
         $cred = $this->authService->Credentials($request);
        $this->authService->LoginUser('parent', $request , $cred);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::PARENT);
    }




    public function logout(Request $request , $guard)
    {
        
        
        $this->authService->logoutUser( $request, $guard);

        
        return redirect()->route('home');
    }

    //Teacher Authentecation


    public function teacherRegister(TeacherRegisterReq $request , TeacherRepository $teacherRepo)
    {
        $validatedReq = $request->validated();
        
        $teacherObj = EntitiesFactory::createEntity(Arr::except($validatedReq , ['image']) , 'teacher');

        
        $teacherObj->UploadImage($this->fileser , $request);

        $authTeacher = $this->authService->RegisterUser($teacherRepo, $teacherObj);

        return back()->with(["status" => trans("auth.resgisterMsg")]);

        
    }



    public function teacherLogin(Request $request)
    {

        $cred =$this->authService->Credentials($request);
        $this->authService->LoginUser('teacher', $request , $cred);
     

        $request->session()->regenerate();
          toastr("compelete your profile" , 'success');
        return redirect()->intended(RouteServiceProvider::TEACHER);
    }

    //School Authentication

    public function SchoolRegister(SchoolRegisterReq $request , SchoolRepository $schoolRepo){
         
        $validatedReq = $request->validated();
         
        
        
        $schoolObj = EntitiesFactory::createEntity(Arr::except($validatedReq , ['image' , 'grade_id']) , 'school');
        
        $schoolObj->UploadImage($this->fileser , $request);
        
       
        $createdSchool = $this->authService->RegisterUser($schoolRepo , $schoolObj);

        $schoolRepo->addGrades($request->grade_id , $createdSchool);

    
    
        return back()->with(["status" => trans("auth.resgisterMsg")]);        


    }


    public function schoolLogin(Request $request)
    {

        $cred = $this->authService->Credentials($request);
        
        $this->authService->LoginUser('school', $request , $cred);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::SCHOOL);
    }


        //Supplier Authentication

        public function SupplierRegister(SupplierAddReq $request , SupplierRepository $supplierRepo){
              
    
            $validatedReq = $request->validated();
    
            $supplierObj =  EntitiesFactory::createEntity( Arr::except($validatedReq , ['image']) , 'supplier');
               
          
          
            $supplierObj->UploadImage($this->fileser , $request);
    
             $supplier = $this->authService->RegisterUser($supplierRepo , $supplierObj);
    
            if (Route::currentRouteName() == 'supplier-register') {
                return $this->response("Supplier Created successfully" , "admin-suppliers" ,  $supplier , $request);
            }

            return $this->response( null, RouteServiceProvider::Supplier ,  $supplier , $request);
        
           
        }



      

    
    
        public function supplierLogin(Request $request)
        {
    
            $cred = $this->authService->Credentials($request);
            $this->authService->LoginUser('supplier', $request , $cred);
    
            $request->session()->regenerate();
    
            return redirect()->intended(RouteServiceProvider::Supplier);
        }


    //Admin Auth

    public function AdminLogin(Request $request){
        $cred = $this->authService->AdminCredentials($request);
       
        $this->authService->LoginUser('web' , $request , $cred);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN);


    }


    //Forget & Reset Password
    public function ParentforgotPassword()
    {
    
        return view('web.Auth.forgot-parent-password');
    }

     public function SchoolforgotPassword(){
        return view('web.Auth.forgot-school-password');
     }

     public function SupplierforgotPassword(){
        return view('web.Auth.forgot-supplier-password');
     }

     public function TeacherforgotPassword(){

        return view("web.Auth.forgot-teacher-password");
     }

     public function AdminForgotPassword(){
        return view('web.Auth.forgot-admin-password');
     }

    public function forgotPasswordPostRequest(Request $request, $broker)
    {
        

        $forgot = new ForgotPassword();

        $response = $forgot->sendResetLinkEmail($request , $broker);

        if ($response == Password::RESET_LINK_SENT) {
            return back()->with("status" , trans($response));
        }

        return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => trans($response)]);

        
    }


    public function ParentresetPassword($token)
    {
        return view('web.Auth.reset-parent-password')->with([
            'token' => $token
        ]);
    }

    public function SchoolresetPassword($token){

        return view("web.Auth.reset-school-password")->with([
            "token" => $token
        ]);
    }

    public function SupplierresetPassword($token){

        return view("web.Auth.reset-supplier-password")->with([
            "token" => $token
        ]);
    }

    public function TeacherResetPassword($token){

         return view("web.Auth.reset-teacher-password")->with(['token' => $token]);
    }

    public function AdminResetPassword($token){

        return view("web.Auth.reset-admin-password")->with(['token' => $token]);
    }

    public function resetPasswordPostRequest(Request $request, $broker , $guard)
    {
       
        $resetObj = new ResetPasswords();

        $resetObj->setGuard($guard);
          
        
       $response = $resetObj->reset($request , $broker);
        
       $url = $resetObj->getUserRedirect($broker);
    
       if ($response == Password::PASSWORD_RESET) {
             return redirect()
              ->route($url)        
              ->with('status', trans($response));
       }

            return back()
              ->withInput($request->only('email'))
              ->withErrors(['email' => trans($response)]);
    }

    
}
