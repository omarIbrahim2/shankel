<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Shankl\Services\FileService;
use App\Http\Requests\ServiceAddReq;
use Shankl\Services\SupplierService;
use App\Http\Requests\ServiceUpdateReq;
use Shankl\Factories\AuthUserFactory;
use Shankl\Repositories\ServiceImagesRepo;
use Shankl\Repositories\ServiceRepository;

class ServiceController extends Controller
{
    private $supplierService;
    private $serviceRepo;
    public function __construct(SupplierService $supplierService , ServiceRepository $ServiceRepo)
    {
        $this->supplierService = $supplierService;
        $this->serviceRepo = $ServiceRepo;
    }
    public function index()
    {

        return view('web.Services.sevices');
    }


    public function serviceImagesUpdateView($serviceId){
        
         $Service = $this->serviceRepo->serviceImages($serviceId);
        return view('web.Services.servicesImages')->with(['Service' => $Service]);
    }


    public function DeleteServiceImage($imageId , ServiceImagesRepo $serviceImagesRepo){
       return $serviceImagesRepo->Delete($imageId);
    }

 

    

    public function singleService($serviceId){

        $Service = $this->supplierService->getService($serviceId);

        return view('web.Services.singleService')->with(['Service' => $Service]);
    }

    public function deleteService($serviceId)
    {
       
       try {
         $this->supplierService->deleteService($serviceId);
         toastr("Deleted successfully", "error", "Deleting");

         return back();
       } catch (\Throwable $th) {
        
        toastr("error in deleting , this service has images ", "error");

        return back();
          
       } 
      

     

     
    }

    public function serviceCreateView($supplierId)
    {
          
        if (AuthUserFactory::geGuard() == 'web') {
            return view("admin.services.create")->with(["supplierId" => $supplierId]);
        }

        return view("web.Suppliers.create")->with(['supplierId' => $supplierId]);
       
    }

    public function serviceUpdateView($serviceId, $supplierId)
    {
        $Service = $this->supplierService->getService($serviceId);
          
        if (AuthUserFactory::geGuard() == 'web') {
            return view("admin.services.update")->with(['Service' => $Service, "supplierId" => $supplierId]);
        }

        return view('web.Suppliers.edit')->with(['Service' => $Service , 'supplierId' => $supplierId]);
       
    }

    public function CreateService(ServiceAddReq $request, FileService $fileService)
    {

        $validatedReq = $request->validated();
       
        $cred = $this->credientials($validatedReq, ['image']);

        $data = $this->evaluateData($cred);
        
        return $this->supplierService->CreateService($data , $request->file('image'));
        
    }

    public function UpdateService(ServiceUpdateReq $request, SupplierService $supplierService)
    {

        $validatedReq = $request->validated();
       
        $cred = $this->credientials($validatedReq, ['image']);

        $data = $this->evaluateData($cred);

        return $supplierService->updateService($data , $request->file('image'));
    }

    private function credientials($validatedReq, $vals)
    {

        return Arr::except($validatedReq, $vals);
    }

    


    private function evaluateData($request)
    {
        $data = array();
        if (array_key_exists('id', $request)) {

            $data['id'] = $request['id'];
        }

        if (array_key_exists('supplier_id', $request)) {

            $data['supplier_id'] = $request['supplier_id'];
        }
        $data['name'] = json_encode([
            'en' => $request['name_en'],
            'ar' => $request['name_ar'],
        ]);

        $data['desc'] = json_encode([
            'en' => $request['desc_en'],
            'ar' => $request['desc_ar'],
        ]);

        $data['price'] = $request['price'];

        $data['quantity'] = $request['quantity'];


        return $data;
    }
}
