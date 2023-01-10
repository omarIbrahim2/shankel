<?php

namespace App\Http\Controllers;

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
use App\Http\Requests\TeacherRegisterReq;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Routing\RoutingServiceProvider;
use Shankl\Repositories\ParentRepository;
use Shankl\Repositories\SchoolRepository;
use Shankl\Repositories\TeacherRepository;

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

        $request->validated();


        $parentObj =  EntitiesFactory::createEntity($request->except('image'), 'parent');

        $parentObj->setPassword($request->password);

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

    public function parentLogin(Request $request)
    {

        $this->authService->LoginUser('parent', $request);

        $request->session()->regenerate();

        return redirect()->route(RouteServiceProvider::PARENT);
    }




    public function logout($guard)
    {
        
        $this->authService->logoutUser($guard);

        
        return redirect()->route('home');
    }

    //Teacher Authentecation

    public function teacherRegister(TeacherRegisterReq $request , TeacherRepository $teacherRepo)
    {
        $request->validated();

        $teacherObj = EntitiesFactory::createEntity($request->except('image'), 'teacher');

        $teacherObj->setPassword($request->Password);
        $teacherObj->changeStatus();
        if ($request->hasFile('image')) {


            $this->fileser->setFile($request->file('image'));

            $this->fileser->setPath("teachers");

            $filePath =  $this->fileser->upload();

            $teacherObj->setImage($filePath);
        }

        $authTeacher = $this->authService->RegisterUser($teacherRepo, $teacherObj);
        
        Auth::guard('teacher')->login($authTeacher);

        $request->session()->regenerate();

        return redirect()->route(RouteServiceProvider::TEACHER);
    }

    public function teacherLogin(Request $request)
    {
        $this->authService->LoginUser('teacher' , $request);

        $request->session()->regenerate();

        return redirect()->route(RouteServiceProvider::TEACHER);
    }

    //School Authentication

    public function SchoolRegister(Request $request , SchoolRepository $schoolRepo){

        //$request->validated();


        $schoolObj = EntitiesFactory::createEntity($request->except(['image' , 'grade_id']) , 'school');

        if ($request->hasFile('image')) {


            $this->fileser->setFile($request->file('image'));

            $this->fileser->setPath("schools");

            $filePath =  $this->fileser->upload();

            $schoolObj->setImage($filePath);
        }

        $schoolObj->setPassword($request->password);
        
        $schoolObj->changeStatus();
   
        $createdSchool = $this->authService->RegisterUser($schoolRepo , $schoolObj);

        $schoolRepo->addGrades($request->grade_id , $createdSchool->id);

        Auth::guard('school')->login($createdSchool);

        $request->session()->regenerate();

        return redirect()->route(RouteServiceProvider::SCHOOL); 
    }


    public function schoolLogin(Request $request)
    {

        $this->authService->LoginUser('school', $request);

        $request->session()->regenerate();

        return redirect()->route(RouteServiceProvider::SCHOOL);
    }


    //Forget & Reset Password
    public function forgotPassword()
    {
    
        return view('web.Auth.forgot-parent-password');
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


    public function resetPassword($token)
    {
        return view('web.Auth.reset-parent-password')->with([
            'token' => $token
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
