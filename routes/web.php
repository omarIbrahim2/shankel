<?php

use App\Models\Role;
use Shankl\Helpers\Paypal;
use App\Models\Transaction;
use App\Http\Controllers\reader;
use Shankl\Entities\AdminEntity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GalleryConroller;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LocationCcontroller;
use App\Http\Controllers\TransactionController;
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

    //parent Forget Password
    Route::get('/forgot-password-parent', [AuthController::class , 'ParentforgotPassword'])->middleware('guest')->name('password.request.parent');
    //school Forget Password
    Route::get('/forgot-password-school', [AuthController::class , 'SchoolforgotPassword'])->middleware('guest')->name('password.request.school');
    //supplier Forget Password
    Route::get('/forgot-password-supplier', [AuthController::class , 'SupplierforgotPassword'])->middleware('guest')->name('password.request.supplier');
    //teacher Forget Password
    Route::get("/forgot-password-teacher" , [AuthController::class , "TeacherforgotPassword"])->middleware('guest')->name("password.request.teacher");
    //admin Forget Password
    Route::get("/forgot-password-admin" , [AuthController::class , "AdminforgotPassword"])->middleware('guest')->name("password.request.admin");
    
    Route::post('/forgot-password/{broker}', [AuthController::class , 'forgotPasswordPostRequest'])->middleware('guest')->name('password.email');
    //Reset Password

    //Parent Reset Password
    Route::get('/reset-password-parent/{token}', [AuthController::class , 'ParentresetPassword'])->middleware('guest')->name('password.reset.parent');
    //Teacher Reset Password
    Route::get('/reset-password-teacher/{token}', [AuthController::class , 'TeacherResetPassword'])->middleware('guest')->name('password.reset.teacher');
    //Admin Reset Password
    Route::get('/reset-password-admin/{token}', [AuthController::class , 'AdminResetPassword'])->middleware('guest')->name('password.reset.admin');
    //School Reset Password
    Route::get('/reset-password-school/{token}', [AuthController::class , 'SchoolresetPassword'])->middleware('guest')->name('password.reset.school');
    //Supplier Reset Password
    Route::get('/reset-password-supplier/{token}', [AuthController::class , 'SupplierresetPassword'])->middleware('guest')->name('password.reset.supplier');

    Route::post('/reset-password-parent/{broker}/{guard}', [AuthController::class , 'resetPasswordPostRequest'])->middleware('guest')->name('password.update');
    
   //web Routes 
   //*-------*//

   Route::get('/events' , [EventsController::class , 'index'])->name('web-events');

   Route::get('/addverts' , [AdvertController::class , 'indexWeb'])->name('web-addverts');

   Route::get('/schools' , [SchoolController::class , 'index'])->name('web-schools');
   Route::get("school/{id}" , [SchoolController::class , "getSchool"])->name('school-by-id');

   Route::get('/suppliers' , [SupplierController::class , 'index'])->name('web-suppliers');
   Route::get("supplier/{id}" , [SupplierController::class , "getSupplier"])->name('supplier-by-id');

   Route::get('/services' , [ServiceController::class , 'index'])->name('web-services');

   Route::get('/teachers' , [TeacherController::class , 'getAllTeachers'])->name('web-teachers');
   Route::get('/teacher/{id}' , [TeacherController::class , 'getOneTeacher'])->middleware('teacherDetails')->name('teacher-by-id');
  

    // Authentication Routs
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
    
    // Supplier Authentication
    Route::get('register/supplier' , [SupplierController::class , 'showRegister'])->middleware("guest")->name('supplier_register');
    Route::get('login/supplier' , [SupplierController::class , 'showLogin'])->middleware('guest')->name('supplier-login');
    Route::post('supplier/register' , [AuthController::class , 'SupplierRegister'])->name('supplier-registeration');
    Route::post('supplier/login' , [AuthController::class , 'supplierLogin'])->name('login-supplier');

    // Admin Auth
    Route::get('/login' , [AdminController::class , 'showLogin'])->middleware('guest')->name('admin-login');
    Route::post('admin/login' , [AuthController::class , 'AdminLogin'])->name('login-admin');
  
    Route::middleware('card')->group(function(){
        Route::post("add/card" , [CardController::class , 'AddToCard'])->name('add-to-card');
        Route::get('card/services' , [CardController::class , "Card"])->name('Card');
        Route::get('remove/card/{serviceId}' , [CardController::class , "remove"])->name('remove-from-card');
    });
 
    
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
        Route::get("filters/view" , [ParentController::class , 'FilterSupplierView'])->name('filter-view');
    });
    
    Route::post('paypal/services/payment' , [TransactionController::class , 'payment'])->name('payment-services');
    Route::get('suppliers/filter' , [ParentController::class , 'FilterSuppliers'])->name('filter-suppliers');

    //admin group

    Route::prefix('dashboard')->middleware('auth')->group(function(){ 
        Route::get('/' , [AdminController::class , 'dashboard'])->name('dashboard');

        //events
        Route::get('events' , [AdminController::class , 'Events'])->name('admin-events');
        Route::get('event/create' , [EventsController::class , "createEventView"])->name('create-events-view');
        Route::get('event/update/{eventid}' , [EventsController::class , "updateEventView"])->name("update-events-view");
        Route::post("event/store" , [EventsController::class , "storeEvent"])->name("create-events");
        Route::post('event/update' , [EventsController::class , "updateEvent"])->name("update-event");
        Route::post('cancelEvent' , [EventsController::class , 'cancelEvent'])->name('cancel-event');  
        //addvertisments
        
        Route::get('addverts' , [AdvertController::class , 'index'])->name('admin-addverts');
        Route::get('addvert/{addvertId}' , [AdvertController::class , 'show'])->name('addvert-show');
        Route::get('create' , [AdvertController::class , "createAddvertView"])->name('create-addverts-view');
        Route::get('addvert/update/{addvertid}' , [AdvertController::class , "updateAddvertView"])->name("update-addverts-view");
        Route::post("addvert/store" , [AdvertController::class , "storeAddvert"])->name("create-addverts");
        Route::post('addvert/update' , [AdvertController::class , "updateAddvert"])->name("update-addvert");
        Route::get('addvert/delete/{addvertId}' , [AdvertController::class , 'delete'])->name('addvert-delete');

        //profile
        Route::get('profile' , [AdminController::class , 'Profile'])->name('admin-profile');
        Route::post('update/profile' , [AdminController::class , "updateProfile"])->name('updateProfile');
        Route::get('changePass/admin' , [AdminController::class , "changePassView"])->name('changePass-admin');
        Route::post("changePass/admin/{user}" , [AdminController::class , "changePass"])->name("submit-change-pass-admin");

        //users
        Route::get("parents/{status}" , [AdminController::class , "Parentts"])->name('admin-parents');
        Route::get("schools/{status}" , [AdminController::class , 'Schools'])->name('admin-schools');
        Route::get("teachers/{status}" , [AdminController::class , 'Teachers'])->name('admin-teachers');
         
        Route::get("school/details/{id}" , [SchoolController::class , "getSchoolAdmin"])->name('school-details');
        Route::get("teacher/details/{id}" , [TeacherController::class , "getTeacherAdmin"])->name('teacher-details');
        Route::get('parent/details/{id}' , [ParentController::class , 'getParentAdmin'])->name("parent-details");
        Route::get('supplier/details/{id}' , [ SupplierController::class, 'getSupplierAdmin'])->name("supplier-details");

        //supplier
        Route::get("suppliers/{status}" , [AdminController::class , 'Suppliers'])->name('admin-suppliers');
        Route::get('supplier/store' , [AdminController::class , 'createSupplierView'])->name("create-supplier");
        Route::get('supplier/update/{supplier_id}' , [AdminController::class , "updateSupplierView"])->name("update-supplier");
        Route::post('supplier/register' , [AuthController::class , "SupplierRegister"])->name("supplier-register");
        Route::post('supplier/update' , [AdminController::class , "updateSupplier"])->name("supplier-update");
        Route::get("delete/Supplier/{id}" , [AdminController::class , "deleteSupplier"])->name("supplier-delete");

        //service
        Route::get("services/{supplier_id}" , [AdminController::class , "Services"])->name("Services");
        Route::get("service/delete/{id}" , [ServiceController::class , "deleteService"])->name("service-delete");
        Route::get("service/create/{supplier_id}" , [ServiceController::class , "serviceCreateView"])->name('service-create-form');
        Route::get("service/update/{serviceId}/{supplierid}", [ServiceController::class ,"serviceUpdateView"])->name("service-update-form");
        Route::post('service/create' , [ServiceController::class , "CreateService"])->name("service-create");
        Route::post('service/update' , [ServiceController::class , "UpdateService"])->name('service-update');

        //orders
        Route::get('orders' , [AdminController::class , "Orders"])->name("Orders");
       
        //socials
        Route::get("socials" , [AdminController::class , "Socials"])->name("Socials");
        Route::get("socials/create" , [AdminController::class , "socialsAddView"])->name("social-add-view");
        Route::get('socials/update/{socialId}' , [AdminController::class ,  "socialUpdateView"])->name("social-update-view");
        Route::post('social/add' , [AdminController::class , 'socialCreate'])->name('social-create');
        Route::post('social/update' , [AdminController::class , "SocialUpdate"])->name('social-update');
        Route::get('social/delete/{socialId}' , [AdminController::class , "SocialDelete"])->name("social-delete");
       
        //messages
        Route::get('messages' , [AdminController::class , 'Messages'])->name('Messsages');
        Route::get('message/delete/{messageId}' , [AdminController::class , 'deleteMessage'])->name('message-delete');
        Route::get('message/show/{messageId}' , [AdminController::class , "showMessage"])->name('message-show');

        //sliders
        Route::get('sliders' , [SliderController::class , 'Sliders'])->name('Sliders');
        Route::get("sliders/create" , [SliderController::class , "create"])->name("slider-create-form");
        Route::get('sliders/edit/{sliderId}' , [SliderController::class , 'edit'])->name("slider-update-form");
        Route::get('slider/delete/{sliderId}' , [SliderController::class , "delete"])->name('slider-delete');
        Route::post("sliders/store" , [SliderController::class , 'store'])->name("slider-create");
        Route::post('slider/update' , [SliderController::class , "update"])->name('slider-update');
        Route::get('slider/{sliderId}' , [SliderController::class , 'show'])->name('slider-show');

        //infos

        Route::get('infos' , [InfoController::class , 'index'])->name('Infos');
        Route::get('infos/create' , [InfoController::class , 'create'])->name('infos-create-form');
        Route::get('infos/edit/{infoId}' , [InfoController::class , 'update'])->name('infos-update-form');
        Route::get("info/{infoId}" , [InfoController::class , 'show'])->name('info-show');
        Route::get('info/delete/{infoId}' , [InfoController::class , 'delete'])->name('info-delete');
        Route::post('infos/store' , [InfoController::class , 'store'])->name('info-create');
        Route::post('infos/update' , [InfoController::class , 'edit'])->name('info-update');

        //Gallery

        
        Route::get('gallery' , [GalleryConroller::class , 'index'])->name('gallery');
        Route::get('gallery/create' , [GalleryConroller::class , 'create'])->name('gallery-create-form');
        Route::get('gallery/edit/{galleryId}' , [GalleryConroller::class , 'update'])->name('gallery-update-form');
        Route::get("gallery/{galleryId}" , [GalleryConroller::class , 'show'])->name('gallery-show');
        Route::get('gallery/delete/{galleryId}' , [GalleryConroller::class , 'delete'])->name('gallery-delete');
        Route::post('gallery/store' , [GalleryConroller::class , 'store'])->name('gallery-create');
        Route::post('gallery/update' , [GalleryConroller::class , 'edit'])->name('gallery-update');
    });

    
        
   
    
    //teacher Group
    Route::middleware('teacher')->group(function(){
        Route::get('/teacher' , [TeacherController::class , 'teacher'])->name('teacher');
        Route::get('/teacher-profile' , [TeacherController::class , 'teacherProfile'])->name('teacher-profile');
        Route::get('changePass/teacher' , [TeacherController::class , 'changePassView'])->name('change_pass_teacher');
        Route::post('changePass/teacher/{user}' , [TeacherController::class , 'changePass'])->name('submit_change_pass_teacher');
        Route::get('suppliers/filter' , [TeacherController::class , 'FilterSuppliers'])->name('filter-suppliers');
        
    });
    
    //school Group
    Route::middleware('school')->group(function(){
        Route::get('/school' , [SchoolController::class , 'school'])->name('school');
        Route::get('/school-profile' , [SchoolController::class, 'schoolProfile'])->name('school-profile');
        Route::get('changePass/school' , [SchoolController::class , "changePassView"] )->name("change_pass_school");
        Route::post('changePass/school/{user}', [SchoolController::class, 'changePass'])->name("submit_change_pass_school");
        Route::get('suppliers/filter' , [SchoolController::class , 'FilterSuppliers'])->name('filter-suppliers');
    });
    
    Route::post('update/comment' , [SchoolController::class , "updateComment"])->name('update-comment');

    //supplier Group
    Route::middleware('supplier')->group(function(){
        Route::get('/supplier' , [SupplierController::class , 'supplier'])->name('supplier');
        Route::get('/supplier-profile' , [SupplierController::class, 'supplierProfile'])->name('supplier-profile');
        Route::get('changePass/supplier' , [SupplierController::class , "changePassView"] )->name("change_pass_supplier");
        Route::post('changePass/supplier/{user}', [SupplierController::class, 'changePass'])->name("submit_change_pass_supplier");
    });
 
    Route::post('update/comment' , [SupplierController::class , "updateComment"])->name('update-comment');
       
    
     
    //Logout
    
    Route::middleware('logout')->group(function(){
        Route::post('logout/{guard}' , [AuthController::class , 'logout'])->name('logout');
    });
    
});