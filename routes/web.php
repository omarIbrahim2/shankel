<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LocationCcontroller;
use App\Http\Controllers\ParentController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('lang')->group(function(){
    Route::get('/', [HomeController::class , "index"])->name('home');

    Route::get('/select' , [HomeController::class ,'selectUserRegister'])->name("selectUserRegister");
    Route::get('/select/login' , [HomeController::class ,'selectUserLogin'])->name("selectUserLogin");
    
    Route::get('register/parent' , [ParentController::class , 'showRegister'])->middleware("guest")->name('parent_register');
    Route::get('login/parent' , [ParentController::class , 'showLogin'])->middleware('guest')->name('parent-login');
    Route::get('api/cities/{cityid}' , [LocationCcontroller::class , "Areas"])->name("areas");

    Route::post('parent/register' , [AuthController::class , 'Parentregister'])->name('parent-register');

    Route::middleware('parent')->group(function(){
        Route::get('/parent' , [ParentController::class , 'parent'])->name('parent')->middleware('child');
        Route::get('add/child/{parentId}' , [ParentController::class , 'addChild'])->name('add-child');
        Route::post('add/child' , [ParentController::class , 'createChild'])->name('create-child');
        Route::post('parent/logout' , [AuthController::class , 'parentLogout'])->name('parent-logout');
    });
});


Route::get('set/lang/{lang}' , [LangController::class , 'set'])->name("lang");





