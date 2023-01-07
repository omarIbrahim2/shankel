<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LocationCcontroller;
use App\Http\Controllers\ParentController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;


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
    Route::post('/reset-password/{broker}', [AuthController::class , 'resetPasswordPostRequest'])->middleware('guest')->name('password.update');


    // Parent Routs
    //*-----------*

    // Parent Authentication
    Route::get('register/parent' , [ParentController::class , 'showRegister'])->middleware("guest")->name('parent_register');
    Route::get('login/parent' , [ParentController::class , 'showLogin'])->middleware('guest')->name('parent-login');
    Route::post('parent/login' , [AuthController::class , 'parentLogin'])->name('login-parent');
    Route::post('parent/register' , [AuthController::class , 'Parentregister'])->name('parent-register');
    
    //Parent Group
    Route::middleware('parent')->group(function(){
        Route::get('/parent' , [ParentController::class , 'parent'])->name('parent')->middleware('child');
        Route::get('add/child/{parentId}' , [ParentController::class , 'addChild'])->name('add-child');
        Route::post('add/child' , [ParentController::class , 'createChild'])->name('create-child');
    });
    
    //Logout
    Route::middleware(['parent','web'])->group(function(){
        Route::post('logout/{guard}' , [AuthController::class , 'parentLogout'])->name('parent-logout');
    });



});







