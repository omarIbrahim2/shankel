<?php

use App\Http\Controllers\AdminController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LocationCcontroller;
use Symfony\Component\Routing\Route as RoutingRoute;

//Lang Route
Route::get('set/lang/{lang}' , [LangController::class , 'set'])->name("lang");


Route::middleware('lang')->group(function(){


    // Home
    Route::get('/', [HomeController::class , "index"])->name('home');

    // Select Page 
    Route::get('/select' , [HomeController::class ,'selectUserRegister'])->name("selectUserRegister");
    Route::get('/select/login' , [HomeController::class ,'selectUserLogin'])->name("selectUserLogin");

    // Areas Api
    Route::get('api/cities/{cityid}' , [LocationCcontroller::class , "Areas"])->name("areas");

    //Forget Password
    Route::get('/forgot-password-parent', [AuthController::class , 'ParentforgotPassword'])->middleware('guest')->name('password.request.parent');
    Route::get('/forgot-password-school', [AuthController::class , 'SchoolforgotPassword'])->middleware('guest')->name('password.request.school');

    Route::post('/forgot-password/{broker}', [AuthController::class , 'forgotPasswordPostRequest'])->middleware('guest')->name('password.email');
    //Reset Password
    Route::get('/reset-password-parent/{token}', [AuthController::class , 'ParentresetPassword'])->middleware('guest')->name('password.reset.parent');
    Route::get('/reset-password-school/{token}', [AuthController::class , 'SchoolresetPassword'])->middleware('guest')->name('password.reset.school');
    Route::post('/reset-password-parent/{broker}/{guard}', [AuthController::class , 'resetPasswordPostRequest'])->middleware('guest')->name('password.update');
    
   //web Routes 
   //*-------*//

   Route::get('/events' , [EventsController::class , 'index'])->name('web-events');

    // Parent Routs
    //*-----------*

    // Parent Authentication
    Route::get('register/parent' , [ParentController::class , 'showRegister'])->middleware("guest")->name('parent_register');
    Route::get('login/parent' , [ParentController::class , 'showLogin'])->middleware('guest')->name('parent-login');
  
    Route::post('parent/login' , [AuthController::class , 'parentLogin'])->name('login-parent');
    Route::post('school/login' , [AuthController::class , 'schoolLogin'])->name('login-school');
    Route::post('parent/register' , [AuthController::class , 'Parentregister'])->name('parent-register');
    
    
    // Teacher Authentication
    Route::get('register/teacher' , [TeacherController::class , 'showRegister'])->middleware("guest")->name('teacher_register');
    Route::get('login/teacher' , [TeacherController::class , 'showLogin'])->middleware('guest')->name('teacher-login');
    Route::post('teacher/register' , [AuthController::class , 'TeacherRegister'])->name('teacher-register');
    Route::post('teacher/login' , [AuthController::class , 'teacherLogin'])->name('login-teacher');
 
    // School Authentication
    Route::get('register/school' , [SchoolController::class , 'showRegister'])->middleware("guest")->name('school_register');
    Route::get('login/school' , [SchoolController::class , 'showLogin'])->middleware('guest')->name('school-login');
    Route::post('school/register' , [AuthController::class , 'SchoolRegister'])->name('school-register');
    Route::post('school/login' , [AuthController::class , 'schoolLogin'])->name('login-school');
    
    // Amin Auth
    Route::get('/login' , [AdminController::class , 'showLogin'])->name('admin-login');
    Route::post('admin/login' , [AuthController::class , 'AdminLogin'])->name('login-admin');



    
    //Parent Group
    Route::middleware('parent')->group(function(){
        Route::get('/parent' , [ParentController::class , 'parent'])->name('parent')->middleware('child');
        Route::get('add/child/{parentId}' , [ParentController::class , 'addChild'])->name('add-child');
        Route::get('editParent/child/{parentId}' , [ParentController::class , 'showAddChild'])->name('add-child-profile');
        Route::get('editProfile' , [ParentController::class , 'showProfile'])->name('parent-profile');
        Route::post('add/child' , [ParentController::class , 'createChild'])->name('create-child');
        Route::post('editProfile/child' , [ParentController::class , 'InsertChild'])->name('InsertChild');
        Route::get('changePass/parent' , [ParentController::class , "changePassView"] )->name("change_pass_parent");
        Route::post("changePass/parent/{user}" , [ParentController::class , "changePass"])->name("submit-change-pass-parent");
    });
    

    //admin group

    Route::prefix('dashboard')->middleware('auth')->group(function(){ 
        Route::get('/' , [AdminController::class , 'dashboard'])->name('dashboard');
        Route::get('events' , [AdminController::class , 'Events'])->name('admin-events');
        Route::get('event/create' , [AdminController::class , "createEventView"])->name('create-events-view');
        Route::get('event/update/{eventid}' , [AdminController::class , "updateEventView"])->name("update-events-view");
        Route::post("event/store" , [AdminController::class , "storeEvent"])->name("create-events");
        Route::post('event/update' , [AdminController::class , "updateEvent"])->name("update-event");
        
    });

    
        
   
    
    //teacher Group
    Route::middleware('teacher')->group(function(){
        Route::get('/teacher' , [TeacherController::class , 'teacher'])->name('teacher');
        Route::get('/teacher-profile' , [TeacherController::class , 'teacherProfile'])->name('teacher-profile');
        Route::get('changePass/teacher' , [TeacherController::class , 'changePassView'])->name('change_pass_teacher');
        Route::post('changePass/teacher/{user}' , [TeacherController::class , 'changePass'])->name('submit_change_pass_teacher');
    });
    
    //school Group
    Route::middleware('school')->group(function(){
        Route::get('/school' , [SchoolController::class , 'school'])->name('school');
        Route::get('/school-profile' , [SchoolController::class, 'schoolProfile'])->name('school-profile');
        Route::get('changePass/school' , [SchoolController::class , "changePassView"] )->name("change_pass_school");
        Route::post('changePass/school/{user}', [SchoolController::class, 'changePass'])->name("submit_change_pass_school");
    });
    

    //Logout
    
    Route::middleware('logout')->group(function(){
        Route::post('logout/{guard}' , [AuthController::class , 'logout'])->name('logout');
    });
    
});