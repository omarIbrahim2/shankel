<?php

namespace App\Http\Livewire\Supplier;

use App\Traits\HandleUpload;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Shankl\Services\FileService;
use Shankl\Services\SupplierService;

class AddServiceForm extends Component
{
    use WithFileUploads;
    public $name_en , $name_ar ;
    public $desc_en , $desc_ar ;
    public $price , $quantity , $image , $supplier_id , $attributes= array();

    public static $defaultImage = "assets/images/services/service.jpg";
    public function render()
    {
        return view('livewire.supplier.add-service-form');
    }

    public function mount(){
       

        $this->supplier_id = Auth::guard('supplier')->user()->id;

    }


    public function setAttributes(){

        $this->attributes = [
            'supplier_id' => $this->supplier_id,
            "name" => json_encode( [
                'en' => $this->name_en ,
                'ar' => $this->name_ar 
                ]),
            'price' => $this->price,
            "desc" =>json_encode( [
                'en' => $this->desc_en,
                'ar' => $this->desc_ar,
               ]),
            'quantity' => $this->quantity, 
        ];
    }

    public function resetInputs(){
            $this->name_en = '';
            $this->name_ar = '';
            $this->price = '';
            $this->desc_en = '';
            $this->desc_ar = '';
            $this->quantity = '';
    }


    public function save(SupplierService $supplierService , FileService $fileService){

        $this->validate([
            "name_en" => "required|string|max:255",
            "name_ar" => "required|string|max:255",
            "supplier_id" => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|integer|min:1',
            "price" => "required|numeric|min:1",
            "desc_en" => "required|string",
            "desc_ar" => "required|string",
            'image' => "image|mimes:jpeg,jpg,png,webp|max:2048|nullable",
        ]);

        $this->setAttributes();
        $currentImage = $supplierService->getServiceDefaultImage();

         $this->attributes['image'] =$supplierService->uploadServiceImage($this->image , $currentImage );
        $service = $supplierService->createService($this->attributes);
        
         toastr("service created successfully" , 'success');

        $this->resetInputs();

    }


}
