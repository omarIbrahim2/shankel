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
use Shankl\Factories\AuthUserFactory;

class EditProfile extends Component
{
    use WithFileUploads;

    private static  $defaultPath = "assets/images/logo/user.png";
    public $name_en ,$name_ar ,
    $orgName_en , $orgName_ar , $type_en , $type_ar ,
    $email,$image,$imagePath,$city,$area_id,
    $Areas,$attributes = array(),$data,$AuthUser;
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
        $this->AuthUser = AuthUserFactory::getAuthUser();

    
        $this->name_en = $this->AuthUser->name("en");
        $this->name_ar = $this->AuthUser->name('ar');
        $this->email = $this->AuthUser->email;
        $this->area_id = $this->AuthUser->area_id;
        $this->imagePath  = $this->AuthUser->image;
        $this->type_en = $this->AuthUser->type('en');
        $this->type_ar = $this->AuthUser->type('ar');
        $this->orgName_en = $this->AuthUser->orgName('en');
        $this->orgName_ar = $this->AuthUser->orgName('ar');
    }

    public function setAttributes()
    {

        $this->attributes = [
            'id' => $this->AuthUser->id,
            "name" =>json_encode( [
                'en' => $this->name_en ,
                'ar' => $this->name_ar 
            ]),
            "email" => $this->email,
            "area_id" => $this->area_id,
            "type" => json_encode([
                'en' => $this->type_en ,
                'ar' => $this->type_ar 
            ]),
            "orgName" => json_encode([
                'en' => $this->orgName_en ,
                'ar' => $this->orgName_ar 
            ]),
        ];
    }

    public function save(SupplierService $supplierService, FileService $fileService)
    {


        $this->validate([
            "name_en" => "required|min:3|string|max:50",
            "name_ar" => "required|min:3|string|max:50",
            "email" => ['required', 'email', 'unique:suppliers,email,' . $this->AuthUser->id],
            'area_id' => 'required|numeric|exists:areas,id',
            "image" => "image|mimes:jpg,png,jpeg,webp|max:2048|nullable",
            "type_en" =>"required|min:3|string|max:50" ,
            "type_ar" =>"required|min:3|string|max:50" ,
            "orgName_en" => "required|min:3|string|max:255",
            "orgName_ar" => "required|min:3|string|max:255",
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
        toastr(trans('school.succMsg'), "success");

    }
}
