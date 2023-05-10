<?php

namespace App\Http\Livewire\Parent;

use App\Models\Area;
use App\Models\City;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Shankl\Services\FileService;
use App\Rules\PhoneValidationRule;
use Shankl\Services\ParentService;
use Illuminate\Support\Facades\Auth;

class ParentProfile extends Component
{
    use WithFileUploads;

   public $attributes = array();
   public $name;
   public $email;
   public $phone;
   public $imagePath;
   public $image;
   public $area_id;
   public $parent_id;
   public $Areas;

   public $originalPath = "";

    protected $parentService;

    public $city;

    

    
    public function render()
    {
        $cities = City::select("id" , "name")->get();

        
         
         $authArea =  Area::findOrFail(Auth::guard('parent')->user()->area_id);

         $authCity =  $authArea->city;
        
        $this->Areas =  Area::where('city_id' , $this->city)->get();
        
        return view('livewire.parent.parent-profile' , [
        'cities' => $cities , 
        "Areas" => $this->Areas,
        "authArea" => $authArea,
        "authCity" => $authCity,
    
    
       ]);
    }

    public function mount(ParentService $parentService){

       $this->parent_id = Auth::guard('parent')->user()->id;
       $this->name =  Auth::guard('parent')->user()->name;

       $this->email = Auth::guard('parent')->user()->email;

       $this->phone = Auth::guard('parent')->user()->phone;

       $this->area_id = Auth::guard('parent')->user()->area_id;
        
        $this->imagePath = Auth::guard('parent')->user()->image;
      
        $this->parentService = $parentService;

        
          
    }


    public function setAttributes(){

        $this->attributes = [
            'id' => $this->parent_id,
           'name' => $this->name,
           'email' => $this->email,
           'phone' => $this->phone,
           'area_id' => $this->area_id,
           
           
        ];

        
    }

    

    public function save(ParentService $parentService, FileService $fileService){
         
        
         $this->validate([
            'name' => 'required|string|min:3',
            'email' => ['required','email'],
            'phone' => ['required' , new PhoneValidationRule()],
            'area_id' => 'exists:areas,id',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048|nullable',
         ]);
        $this->parentService = $parentService;
       
          $this->setAttributes();

        if ($this->image != null) {
                    
           
              if ($this->imagePath) {
                  $fileService->DeleteFile($this->imagePath);
              }
                $fileService->setPath('parents');
                $fileService->setFile($this->image);
                $this->attributes['image'] = $fileService->uploadFile();
            
        }
      
        
         
         $this->parentService->upadateProfile($this->attributes);
   
      
         session()->flash("success" , "data updated successfully");
      

    }

   

  

    
}
