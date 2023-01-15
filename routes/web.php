<?php

use App\Http\Controllers\AdminController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    Route::get('/forgot-password', [AuthController::class , 'forgotPassword'])->middleware('guest')->name('password.request');
    Route::post('/forgot-password/{broker}', [AuthController::class , 'forgotPasswordPostRequest'])->middleware('guest')->name('password.email');
    //Reset Password
    Route::get('/reset-password/{token}', [AuthController::class , 'resetPassword'])->middleware('guest')->name('password.reset');
    Route::post('/reset-password/{broker}/{guard}', [AuthController::class , 'resetPasswordPostRequest'])->middleware('guest')->name('password.update');


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
        Route::post('add/child' , [ParentController::class , 'createChild'])->name('create-child');
    });
    Route::get('/dashboard' , [AdminController::class , 'dashboard']);

    Route::prefix('dashboard')->middleware('auth')->group(function(){ 
        
        
            


    });
    
    //teacher Group
    Route::middleware('teacher')->group(function(){
        Route::get('/teacher' , [TeacherController::class , 'teacher'])->name('teacher');
    });
    
    //school Group
    Route::middleware('school')->group(function(){
        Route::get('/school' , [SchoolController::class , 'school'])->name('school');
    });
    

    //Logout
    
    Route::middleware('logout')->group(function(){
        Route::post('logout/{guard}' , [AuthController::class , 'logout'])->name('logout');
    });
    
});