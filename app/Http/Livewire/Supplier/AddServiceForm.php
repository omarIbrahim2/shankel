<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Shankl\Services\SupplierService;

class AddServiceForm extends Component
{
    use WithFileUploads;

    public $name , $desc , $price , $quantity , $image , $supplier_id , $attributes= array();

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
            'name' => $this->name,
            'price' => $this->price,
            'desc' => $this->desc,
            'quantity' => $this->quantity, 
        ];
    }

    public function resetInputs(){
            $this->name = '';
            $this->price = '';
            $this->desc = '';
            $this->quantity = '';
    }


    public function save(SupplierService $supplierService){

        $this->validate([
            "name" => "required|string|max:255",
            "supplier_id" => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|integer|min:1',
            "price" => "required|numeric|min:1",
            "desc" => "required|string",
            'image' => "image|mimes:jpeg,jpg,png,webp|max:2048|nullable",
        ]);

        $this->setAttributes();

        $service = $supplierService->createService($this->attributes);

         toastr("service created successfully" , 'success');

        $this->resetInputs();

    }


}
