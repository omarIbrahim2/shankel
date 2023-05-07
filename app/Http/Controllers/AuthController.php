<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Shankl\Services\AuthService;
use Shankl\Services\FileService;
use Shankl\Entities\ParentEntity;
use Shankl\Helpers\forgotPassword;
use Shankl\Helpers\ResetPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
use Shankl\Repositories\TeacherRepository;
use Illuminate\Routing\RoutingServiceProvider;

class AuthController extends Controller
{

    private AuthService  $authService;

    private FileServiceAdapter $fileser;
    public function __construct(AuthService $authService, FileServiceAdapter $fileser)
    {
        $this->authService = $authService;

        $this->fileser = $fileser;
    }


    //parent Authentecation

    public function Parentregister(ParentRegisterReq $request, ParentRepository $parentRepo)
    {

        $validatedReq = $request->validated();


        $parentObj =  EntitiesFactory::createEntity( Arr::except($validatedReq , ['image']) , 'parent');

        $parentObj->setPassword($validatedReq['password']);

        $parentObj->changeStatus();

        if ($request->hasFile('image')) {


            $this->fileser->setFile($request->file('image'));

            $this->fileser->setPath("parents");

            $filePath =  $this->fileser->upload();

            $parentObj->setImage($filePath);
        }

        $authParent = $this->authService->RegisterUser($parentRepo, $parentObj);

        Auth::guard('parent')->login($authParent);

        $request->session()->regenerate();


        

        return redirect()->route('add-child', $authParent->id);
    }

    public function SupplierRegister(){


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

        $teacherObj->setPassword($validatedReq['password']);
        if ($request->hasFile('image')) {


            $this->fileser->setFile($request->file('image'));

            $this->fileser->setPath("teachers");

            $filePath =  $this->fileser->upload();

            $teacherObj->setImage($filePath);
        }

        $authTeacher = $this->authService->RegisterUser($teacherRepo, $teacherObj);

        return back()->with(["status" => trans("auth.resgisterMsg")]);

        
    }

    public function teacherLogin(Request $request)
    {

        $cred =$this->authService->Credentials($request);
        $this->authService->LoginUser('teacher', $request , $cred);
     

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::TEACHER);
    }

    //School Authentication

    public function SchoolRegister(SchoolRegisterReq $request , SchoolRepository $schoolRepo){
         
        $validatedReq = $request->validated();
         
        
        
        $schoolObj = EntitiesFactory::createEntity(Arr::except($validatedReq , ['image' , 'grade_id']) , 'school');
        
        if ($request->hasFile('image')) {


            $this->fileser->setFile($request->file('image'));

            $this->fileser->setPath("schools");

            $filePath =  $this->fileser->upload();

            $schoolObj->setImage($filePath);
        }

        $schoolObj->setPassword($validatedReq['password']);
        
       
   
        $createdSchool = $this->authService->RegisterUser($schoolRepo , $schoolObj);

        $schoolRepo->addGrades($request->grade_id , $createdSchool->id);

    
    
        return back()->with(["status" => trans("auth.resgisterMsg")]);        


    }


    public function schoolLogin(Request $request)
    {

      // dd(Auth::guard('school')->attempt($request->only('email' , 'password')));
        $cred = $this->authService->Credentials($request);
        $this->authService->LoginUser('school', $request , $cred);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::SCHOOL);
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

    public function forgotPasswordPostRequest(Request $request, $broker)
    {
        

        $forgot = new forgotPassword();

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
