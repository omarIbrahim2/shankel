<?php

namespace App\Http\Livewire\School;

use App\Models\Area;
use App\Models\City;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Shankl\Services\FileService;
use App\Rules\PhoneValidationRule;
use Shankl\Services\SchoolService;
use Illuminate\Support\Facades\Auth;

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
    public $userGrades= array();
    public $city;
    public $area_id;
    public $Areas;
    public $attributes = array();
    protected $listeners = [
        "fresh" => '$refresh',
    ];
   

    public function render()
    {
        $cities = City::select("id" , "name")->get();
        $authArea =  Area::findOrFail(Auth::guard('school')->user()->area_id);
        $authCity =  $authArea->city;
       $this->Areas =  Area::where('city_id' , $this->city)->get();
        return view('livewire.school.edit-school-profile' 
        , [ 'cities' => $cities , 
        "Areas" => $this->Areas,
        "authArea" => $authArea,
        "authCity" => $authCity,
    ]

     
);
    }

    public function mount(){
       
        $this->intialize();
        $this->assignGrades();
        $this->setUgrades();

        
    }

    public function intialize(){
        $this->AuthUser = Auth::guard('school')->user();
        
        $this->mission_en = $this->AuthUser->mission_en;
        $this->mission_ar = $this->AuthUser->mission_ar;

        $this->vision_en = $this->AuthUser->vision_en;
        $this->vision_ar = $this->AuthUser->vision_ar;

        $this->desc_en = $this->AuthUser->desc_en;
        $this->desc_ar = $this->AuthUser->desc_ar;

        $this->name_en = $this->AuthUser->name_en;
        $this->name_ar = $this->AuthUser->name_ar;

        $this->email = $this->AuthUser->email;

        $this->phone = $this->AuthUser->phone;

        $this->establish_date = $this->AuthUser->establish_date;

        $this->edu_systems_id = $this->AuthUser->edu_systems_id;

        $this->facebook = $this->AuthUser->facebook ;

        $this->linkedin = $this->AuthUser->linkedin ;

        $this->twitter = $this->AuthUser->twitter ;

        $this->area_id = $this->AuthUser->area_id;

        $this->imagePath  = $this->AuthUser->image;
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

         ];

         

    }

    public function assignGrades(){
         
        $grades = $this->AuthUser->grades;


        foreach($grades as $grade){
             
            $this->userGrades[$grade->id] = $grade;
         
            
        }


    }

    public function setUgrades(){

        foreach($this->grades as $grade){

            if (array_key_exists($grade->id , $this->userGrades)) {
                $this->Ugrades[$grade->id] = true;
            }else{
                $this->Ugrades[$grade->id] = false;
            }
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
          toastr("data updated successfully" , "success");                  

    }
}
