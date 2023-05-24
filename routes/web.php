<?php

use Shankl\Helpers\Paypal;
use App\Models\Transaction;
use App\Http\Controllers\reader;
use Shankl\Entities\AdminEntity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LocationCcontroller;
use Symfony\Component\Routing\Route as RoutingRoute;

//Lang Route
Route::get('set/lang/{lang}' , [LangController::class , 'set'])->name("lang");

Route::get('/excel' , [reader::class , 'index']);
Route::middleware('lang')->group(function(){


    // Home
    Route::get('/', [HomeController::class , "index"])->name('home');

    // Select Page 
    Route::get('/select' , [HomeController::class ,'selectUserRegister'])->name("selectUserRegister");
    Route::get('/select/login' , [HomeController::class ,'selectUserLogin'])->name("selectUserLogin");

    // Areas Api
    Route::get('api/cities/{cityid}' , [LocationCcontroller::class , "Areas"])->name("areas");

    //Forget Password

    //parent
    Route::get('/forgot-password-parent', [AuthController::class , 'ParentforgotPassword'])->middleware('guest')->name('password.request.parent');
    //school
    Route::get('/forgot-password-school', [AuthController::class , 'SchoolforgotPassword'])->middleware('guest')->name('password.request.school');
    Route::post('/forgot-password/{broker}', [AuthController::class , 'forgotPasswordPostRequest'])->middleware('guest')->name('password.email');

    Route::get("/forgot-password-teacher" , [AuthController::class , "TeacherforgotPassword"])->middleware('guest')->name("password.request.teacher");
    
    Route::get("/forgot-password-admin" , [AuthController::class , "AdminforgotPassword"])->middleware('guest')->name("password.request.admin");

    Route::get('/reset-password-parent/{token}', [AuthController::class , 'ParentresetPassword'])->middleware('guest')->name('password.reset.parent');
    Route::get('/reset-password-teacher/{token}', [AuthController::class , 'TeacherResetPassword'])->middleware('guest')->name('password.reset.teacher');

    Route::get('/reset-password-admin/{token}', [AuthController::class , 'AdminResetPassword'])->middleware('guest')->name('password.reset.admin');
    
    Route::get('/reset-password-school/{token}', [AuthController::class , 'SchoolresetPassword'])->middleware('guest')->name('password.reset.school');
    Route::post('/reset-password-parent/{broker}/{guard}', [AuthController::class , 'resetPasswordPostRequest'])->middleware('guest')->name('password.update');
    
   //web Routes 
   //*-------*//

   Route::get('/events' , [EventsController::class , 'index'])->name('web-events');

   Route::get('/schools' , [SchoolController::class , 'index'])->name('web-schools');

   Route::get("school/{id}" , [SchoolController::class , "getSchool"])->name('school-by-id');

   Route::get('/services' , [ServiceController::class , 'index'])->name('web-services');

  

    // Parent Routs
    //*-----------*

    // Parent Authentication
    Route::get('register/parent' , [ParentController::class , 'showRegister'])->middleware("guest")->name('parent_register');
    Route::get('login/parent' , [ParentController::class , 'showLogin'])->middleware('guest')->name('parent-login');
  
    Route::post('parent/login' , [AuthController::class , 'parentLogin'])->name('login-parent');
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
    Route::get('/login' , [AdminController::class , 'showLogin'])->middleware('guest')->name('admin-login');
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
        Route::get('register/school/payment/{schoolId}' , [ParentController::class , "showRegisterForm"])->middleware('child')->name("register-form-school");
        Route::post("paypal/payment" , [PaypalController::class , "payment"])->name("paypal-payment")->middleware('child'); 
        Route::get("paypal/success" , [PaypalController::class , 'success'])->name('paypal-success')->middleware('child');
        Route::get("paypal/cancel" , [PaypalController::class , 'cancel'])->name('paypal-cancel')->middleware('child');
        Route::get("filters/view" , [ParentController::class , 'FilterSchoolView'])->name('filter-view');
        Route::get('schools/filter' , [ParentController::class , 'FilterSchools'])->name('filter-schools');
    });
    

    //admin group

    Route::prefix('dashboard')->middleware('auth')->group(function(){ 
        Route::get('/' , [AdminController::class , 'dashboard'])->name('dashboard');
        Route::get('events' , [AdminController::class , 'Events'])->name('admin-events');
        Route::get('event/create' , [EventsController::class , "createEventView"])->name('create-events-view');
        Route::get('event/update/{eventid}' , [EventsController::class , "updateEventView"])->name("update-events-view");
        Route::post("event/store" , [EventsController::class , "storeEvent"])->name("create-events");
        Route::post('event/update' , [EventsController::class , "updateEvent"])->name("update-event");
        Route::get("parents/{status}" , [AdminController::class , "Parentts"])->name('admin-parents');
        Route::get("schools/{status}" , [AdminController::class , 'Schools'])->name('admin-schools');
        Route::get("teachers/{status}" , [AdminController::class , 'Teachers'])->name('admin-teachers');
        Route::get("suppliers/{status}" , [AdminController::class , 'Suppliers'])->name('admin-suppliers');
        Route::get('supplier/store' , [AdminController::class , 'createSupplierView'])->name("create-supplier");
        Route::get('supplier/update/{supplier_id}' , [AdminController::class , "updateSupplierView"])->name("update-supplier");
        Route::post('supplier/register' , [AuthController::class , "SupplierRegister"])->name("supplier-register");
        Route::post('supplier/update' , [AdminController::class , "updateSupplier"])->name("supplier-update");
        Route::get("delete/Supplier/{id}" , [AdminController::class , "deleteSupplier"])->name("supplier-delete");
        Route::get("services/{supplier_id}" , [AdminController::class , "Services"])->name("Services");
        Route::get("service/delete/{id}" , [ServiceController::class , "deleteService"])->name("service-delete");
        Route::get("service/create/{supplier_id}" , [ServiceController::class , "serviceCreateView"])->name('service-create-form');
        Route::get("service/update/{serviceId}/{supplierid}", [ServiceController::class ,"serviceUpdateView"])->name("service-update-form");
        Route::post('service/create' , [ServiceController::class , "CreateService"])->name("service-create");
        Route::post('service/update' , [ServiceController::class , "UpdateService"])->name('service-update');
        Route::get('orders' , [AdminController::class , "Orders"])->name("Orders");
       
        Route::get("socials" , [AdminController::class , "Socials"])->name("Socials");
        Route::get("socials/create" , [AdminController::class , "socialsAddView"])->name("social-add-view");
        Route::get('socials/update/{socialId}' , [AdminController::class ,  "socialUpdateView"])->name("social-update-view");
        Route::post('social/add' , [AdminController::class , 'socialCreate'])->name('social-create');
        Route::post('social/update' , [AdminController::class , "SocialUpdate"])->name('social-update');
        Route::get('social/delete/{socialId}' , [AdminController::class , "SocialDelete"])->name("social-delete");
       
        Route::get('messages' , [AdminController::class , 'Messages'])->name('Messsages');
        Route::get('message/delete/{messageId}' , [AdminController::class , 'deleteMessage'])->name('message-delete');
        Route::get('message/show/{messageId}' , [AdminController::class , "showMessage"])->name('message-show');
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
    
 
       
        Route::post('update/comment' , [SchoolController::class , "updateComment"])->name('update-comment');
    
     
    //Logout
    
    Route::middleware('logout')->group(function(){
        Route::post('logout/{guard}' , [AuthController::class , 'logout'])->name('logout');
    });
    
});