<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Shankl\Services\FileService;
use App\Http\Requests\ServiceAddReq;
use Shankl\Services\SupplierService;
use App\Http\Requests\ServiceUpdateReq;

class ServiceController extends Controller
{
    private $supplierService;
    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }
    public function index()
    {

        return view('web.Services.sevices');
    }

    public function deleteService($serviceId)
    {

        $action = $this->supplierService->deleteService($serviceId);

        if ($action) {

            toastr("Deleted successfully", "error", "Deleting");

            return back();
        }

        toastr("error in deleting", "error");

        return back();
    }

    public function serviceCreateView($supplierId)
    {

        return view("admin.services.create")->with(["supplierId" => $supplierId]);
    }

    public function serviceUpdateView($serviceId, $supplierId)
    {
        $Service = $this->supplierService->getService($serviceId);

        return view("admin.services.update")->with(['Service' => $Service, "supplierId" => $supplierId]);
    }

    public function CreateService(ServiceAddReq $request, FileService $fileService)
    {

        $validatedreq =  $request->validated();
        $data = $this->evaluateData($validatedreq );
        $data = $this->credientials($validatedreq, ['image']);


        if ($request->has('image')) {

            $fileService->setPath('services');

            $fileService->setFile($request->image);


            $data['image'] = $fileService->uploadFile();
        }

        $service = $this->supplierService->CreateService($data);

        if ($service) {
            toastr("service created successfully", "success");

            return redirect()->route("Services", $data['supplier_id']);
        }

        toastr("error in creating", "error");

        return redirect()->route("Services", $data['supplier_id']);
    }

    public function UpdateService(ServiceUpdateReq $request, SupplierService $supplierService)
    {

        $validatedReq = $request->validated();
        $data = $this->evaluateData($validatedReq);
        $data = $this->credientials($validatedReq, ['image']);

        $serviceCurrentImage = $supplierService->getService($data['id'])->image;

        $image = $supplierService->uploadServiceImage($request->image, $serviceCurrentImage);

        if ($image != null) {

            $data['image'] = $image;
        }


        $action = $supplierService->updateService($data);

        if ($action) {

            toastr("service updated successfully", "info", "Service update");

            return redirect()->route('dashboard');
        }

        toastr("something wrong happened", "error", "Service update");
        return redirect()->back();
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
        $data['name'] = json_encode([
            'en' => $request['name_en'],
            'ar' => $request['name_ar'],
        ]);

        $data['desc'] = json_encode([
            'en' => $request['desc_en'],
            'ar' => $request['desc_ar'],
        ]);


        return $data;
    }
}
