<?php

namespace App\Http\Livewire\School;

use App\Models\Area;
use App\Models\City;
use App\Models\Grade;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Shankl\Interfaces\GradeRepoInterface;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Services\FileService;
use App\Rules\PhoneValidationRule;
use Shankl\Services\SchoolService;
use Illuminate\Support\Facades\Auth;
use Shankl\Factories\AuthUserFactory;

class EditSchoolProfile extends Component
{
    use WithFileUploads;
   
    private static  $defaultPath = "assets/images/logo/user.png";
    public $data;
    public $AuthUser;
    public $mission_en , $mission_ar;
    public $vision_en , $vision_ar;
    public $desc_en , $desc_ar;
    public $name_en , $name_ar;
    public $facebook;
    public $twitter;
    public $linkedin;
    public $email;
    public $phone;
    public $establish_date;
    public $grades;
    public $image;
    public $imagePath;
    public $Ugrades=array();
    public $eSystems;
    public $edu_systems_id;

    public $free_seats;
    public $userGrades= array();
    public $Cities;
    public $area_id;
    public $city;

    public $Areas;
    public $attributes = array();
    protected $listeners = [
        "fresh" => '$refresh',
        
        
    ];
   

    public function render()
    {


       try {
            $Cities = $this->Cities;
        $authArea =  Area::select('name' , 'id' , 'city_id')->with(['city:name,id'])->findOrFail($this->AuthUser->area_id);
        $authCity =  $authArea->city;
       $this->Areas =  Area::select('name' , 'id')->where('city_id' , $this->city)->get();
       } catch (\Throwable $th) {
          
         return view('livewire.school.edit-school-profile' , [ 'cities' => null , 
        "Areas" => null,
        "authArea" => null,
        "authCity" => null,
    ]);
       }
    
        return view('livewire.school.edit-school-profile'
        , [ 'cities' => $Cities , 
        "Areas" => $this->Areas,
        "authArea" => $authArea,
        "authCity" => $authCity,
    ]
    

     
       );
    }


 

 
    public function mount(){
        $this->emit('profileAdded');
        $this->intialize();
        $this->assignGrades();        
    }

    public function intialize(){

        
        $this->AuthUser = AuthUserFactory::getAuthUser();


    
        if ($this->AuthUser->mission == null) {
            $this->mission_ar = null;
            $this->mission_en = null;
       }else{

              $this->mission_ar = $this->AuthUser->mission('ar');
            $this->mission_en = $this->AuthUser->mission('en');
       }

        if ($this->AuthUser->vision == null) {
            $this->vision_ar = null;
            $this->vision_en = null;
       }else{

              $this->vision_ar = $this->AuthUser->vision('ar');
            $this->vision_en = $this->AuthUser->vision('en');
       }
        
        if ($this->AuthUser->desc == null) {
             $this->desc_ar = null;
             $this->desc_en = null;
        }else{

               $this->desc_ar = $this->AuthUser->desc('ar');
             $this->desc_en = $this->AuthUser->desc('en');
        }

        $this->name_en = $this->AuthUser->name('en');
        $this->name_ar = $this->AuthUser->name('ar');

        $this->email = $this->AuthUser->email;

        $this->phone = $this->AuthUser->phone;

        $this->establish_date = $this->AuthUser->establish_date;

        $this->edu_systems_id = $this->AuthUser->edu_systems_id;

        $this->facebook = $this->AuthUser->facebook ;

        $this->linkedin = $this->AuthUser->linkedin ;

        $this->twitter = $this->AuthUser->twitter ;

        $this->area_id = $this->AuthUser->area_id;

        $this->imagePath  = $this->AuthUser->image;
        $this->free_seats = $this->AuthUser->free_seats;
    }

    public function setAttributes(){
        
         $this->attributes = [
            'id' => $this->AuthUser->id,
           "name" => [
            'en' => $this->name_en ,
            'ar' => $this->name_ar 
            ],
           "mission" => [
            'en' => $this->mission_en,
            'ar' => $this->mission_ar,
           ],
           "desc" => [
            'en' => $this->desc_en,
            'ar' => $this->desc_ar,
           ],
           "vision" => [
            'en' => $this->vision_en,
            'ar' => $this->vision_ar,
           ],
            "email" => $this->email,
            'phone' => $this->phone,
            "establish_date" => $this->establish_date,
            "edu_systems_id" => $this->edu_systems_id,
            "area_id" => $this->area_id,
            "facebook" => $this->facebook,
            "linkedin" => $this->linkedin,
            "twitter" => $this->twitter,
            'free_seats' => $this->free_seats,

         ];

         

    }

    public function assignGrades(){
         
        
        $this->grades = Grade::select('name' , 'id')->with(['schools:id,name'])->get();
    
        foreach($this->grades as $grade){
               $Gradeschools = $grade->schools;

               $this->Ugrades[$grade->id] = $Gradeschools->contains($this->AuthUser->id);  
        }


    }



    public function getChoosenGrades(){
        $filtered = array();

        foreach($this->Ugrades as $ugradekey => $ugradeval){
          
          if ($this->Ugrades[$ugradekey] == true) {
               
              $filtered[] = $ugradekey;
          }
            
        }

        return $filtered;

    }

    public function save(SchoolService $schoolService , FileService $fileService){
          
       
         $this->validate([
            "name_en" => "required|min:3|string|max:50",
            "name_ar" => "required|min:3|string|max:50",
            "email" => ['required','email', 'unique:schools,email,' .$this->AuthUser->id ],
            "phone" => ['required', new PhoneValidationRule()],
            'area_id' => 'required|numeric|exists:areas,id',
            "establish_date" => "required|date|before:today",
            'free_seats' => 'numeric|min:0|nullable',
            "desc_en" => 'string|nullable',
            "desc_ar" => 'string|nullable',
            "mission_en" => "string|nullable",
            "mission_ar" => "string|nullable",
            "vision_en" => 'string|nullable',
            "vision_ar" => 'string|nullable',
            "edu_systems_id" => 'required|exists:edu_systems,id',
            "facebook" => "nullable|url",
            "twitter" => "nullable|url",
            "linkedin" => "nullable|url",
            "image" => "image|mimes:jpg,png,jpeg,webp|max:2048|nullable" 
         ]);

         $this->setAttributes();

          $choosenGrades = $this->getChoosenGrades();  
          
          if ($this->image != null) {
            
               if ($this->imagePath != self::$defaultPath) {
                  $deleted = substr($this->imagePath , 8);
                  $fileService->DeleteFile($deleted);
               } 
               
               $fileService->setPath("schools");

               $fileService->setFile($this->image);

              $this->attributes['image'] =  $fileService->uploadFile();
          }

        
          $schoolService->updatedGrades($choosenGrades , $this->AuthUser->id);
    
          $schoolService->updateProfile($this->attributes);
          $this->emit("fresh");
          $this->image=null;
          toastr(trans('school.succMsg') , "success");  
          
          $this->dispatchBrowserEvent('profile-updated');
          
    }
}
