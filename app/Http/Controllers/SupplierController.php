<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Shankl\Services\AdminService;
use App\Models\Service;
use Shankl\Helpers\ChangePassword;
use Shankl\Services\SupplierService;
use Shankl\Factories\AuthUserFactory;
use Illuminate\Support\Facades\Config;
use Shankl\Factories\RepositoryFactory;
use App\Http\Requests\CommentUpdateRequest;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Services\CardService;

class SupplierController extends Controller
{
  private $changePassObj, $supplierService, $adminService;

  public function __construct(ChangePassword $changepass, SupplierService $supplierService, AdminService $adminService)
  {
    $this->changePassObj = $changepass;
    $this->supplierService = $supplierService;
    $this->adminService = $adminService;
  }
  // Admin
  public function getSupplierAdmin($id)
  {

    return view('admin.suppliers.details')->with(['id' => $id]);
  }


  //Web
  public function index()
  {
    return view("web.Suppliers.allSuppliers");
  }

  public function supplier()
  {
    $sliders = $this->adminService->getSliders();
    if (count($sliders) == 0) {
      $data['slider'] = collect()->pop();
    } else {
      $data['slider'] = $sliders->random();
    }
    return view("web.Suppliers.profile")->with($data);
  }


  public function supplierProfile()
  {

    return view('web.Suppliers.editProfile');
  }
  public function showRegister(LocationRepoInterface $locationRepo)
  {

    $data['cities'] =  $locationRepo->getCities();

    return view("web.Auth.Supplier.supplierRegister")->with($data);
  }

  public function showLogin()
  {

    return view("web.Auth.Supplier.supplierLogin");
  }

  public function changePassView()
  {

    return view('web.Auth.Supplier.Change_Pass');
  }

  public function changePass(Request $request, $guard)
  {

    $result = $this->changePassObj->changePass($request, $guard);

    if ($result == false) {
      return back()->with('error', trans('auth.oldPassMsg'));
    }
    $url =  Config::get('auth.custom.' . $guard . ".url");
    toastr(trans("register.changepass"), "success");
    return redirect()->route($url);
  }


  public function getSupplier(CardService $CardSer  , $supplierId)
  {
    
    $userRepo = RepositoryFactory::getUserRebo(AuthUserFactory::geGuard()); 

    
    $supplier  = $this->supplierService->getSupplier($supplierId);

    $sliders = $this->adminService->getSliders();
    if (count($sliders) == 0) {
      $slider = collect()->pop();
    } else {
      $slider = $sliders->random();
    }

    
   if ($userRepo != null) {
       $card =  $CardSer->getCardWithServices($userRepo);

       $cardServices = $card->services;

        if ($supplier->services) {
            
         $AllServices =  $supplier->services->map(function($service) use ($cardServices){
                     
            if ($cardServices->contains($service->id)) {
                    
              $service->setAttribute('added' , true);
      
              return $service;
             
          }
          $service->setAttribute('added' , false);
          return $service;      
                       
                

          });


          $AllSupplierServices = Service::paginate($AllServices , 5);

        
          return view('web.Suppliers.supplierPage')->with(['Services' => $AllSupplierServices , 'Supplier' => $supplier , 'slider' => $slider]);
        }
           


       

   }

    $AllSupplierServices = Service::paginate($supplier->services , 5);

    return view("web.Suppliers.supplierPage")->with(['Supplier' => $supplier , 'Services' => $AllSupplierServices  , 'slider' => $slider]);
  }

  public function updateComment(CommentUpdateRequest $request)
  {

    $validatedReq =  $request->validated();

    $action = $this->supplierService->updateComment($validatedReq['comment'], $validatedReq['id']);

    if ($action) {
      toastr("updated successfully", "success", "update comment");

      return back();
    }

    toastr("error happened in updating", "error", "update comment");
    return back();
  }


  public function supplierServices(){
    return view("web.Suppliers.services");
  }

  public function areaSuppliers() {
    return view("web.Suppliers.areaSuppliers");
  }

  public function areaSchools() {
    return view("web.Suppliers.areaSchools");
  }

  public function areaCenters() {
    return view("web.Suppliers.areaCenters");
  }

  public function areaKgs() {
    return view("web.Suppliers.areaKgs");
  }

  public function areaTeachers() {
    return view("web.Suppliers.areaTeachers");
  }

}
