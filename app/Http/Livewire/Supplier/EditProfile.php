<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Models\Area;
use App\Models\City;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Shankl\Services\FileService;
use App\Rules\PhoneValidationRule;
use Shankl\Services\SupplierService;
use Illuminate\Support\Facades\Auth;

class EditProfile extends Component
{
    use WithFileUploads;

    private static  $defaultPath = "assets/images/logo/user.png";
    public $name , $orgName , $type ,$email,$image,$imagePath,$city,$area_id,$Areas,$attributes = array(),$data,$AuthUser;
    protected $listeners = [
        "fresh" => '$refresh',
    ];

    public function render()
    {
        $cities = City::select("id", "name")->get();



        $authArea =  Area::findOrFail(Auth::guard('supplier')->user()->area_id);

        $authCity =  $authArea->city;

        $this->Areas =  Area::where('city_id', $this->city)->get();
        return view(
            'livewire.supplier.edit-profile',
            [
                'cities' => $cities,
                "Areas" => $this->Areas,
                "authArea" => $authArea,
                "authCity" => $authCity,
            ]
        );
    }

    public function mount()
    {
        
        $this->intialize();

    }

    public function intialize()
    {
        $this->AuthUser = Auth::guard('supplier')->user();
        $this->name = $this->AuthUser->name;
        $this->email = $this->AuthUser->email;
        $this->area_id = $this->AuthUser->area_id;
        $this->imagePath  = $this->AuthUser->image;
        $this->type = $this->AuthUser->type;
        $this->orgName = $this->AuthUser->orgName;
    }

    public function setAttributes()
    {

        $this->attributes = [
            'id' => $this->AuthUser->id,
            "name" => $this->name,
            "email" => $this->email,
            "area_id" => $this->area_id,
            "type" => $this->type,
            "orgName" => $this->orgName,
        ];
    }

    public function save(SupplierService $supplierService, FileService $fileService)
    {


        $this->validate([
            "name" => "required|min:3|string|max:50",
            "email" => ['required', 'email', 'unique:suppliers,email,' . $this->AuthUser->id],
            'area_id' => 'required|numeric|exists:areas,id',
            "image" => "image|mimes:jpg,png,jpeg,webp|max:2048|nullable",
            "type" =>"required|min:3|string|max:50" ,
            "orgName" => "required|min:3|string|max:255",
        ]);

        $this->setAttributes();


        if ($this->image != null) {

            if ($this->imagePath != self::$defaultPath) {
                $deleted = substr($this->imagePath, 8);
                $fileService->DeleteFile($deleted);
            }

            $fileService->setPath("suppliers");

            $fileService->setFile($this->image);

            $this->attributes['image'] =  $fileService->uploadFile();
        }


        $supplierService->updateProfile($this->attributes);
        $this->emit("fresh");
        $this->image = null;
        toastr("data updated successfully", "success");

    }
}
