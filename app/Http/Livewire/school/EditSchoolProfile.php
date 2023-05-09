<?php

namespace App\Http\Livewire\school;

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

    public $mission;

    public $vision;

    public $desc;

    public $name;

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
        
        $this->mission = $this->AuthUser->mission;

        $this->vision = $this->AuthUser->vision;

        $this->desc = $this->AuthUser->desc;

        $this->name = $this->AuthUser->name;

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
           "name" => $this->name,
           "mission" => $this->mission,
           "desc" => $this->desc,
           "vision" => $this->vision,
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
            "name" => "required|min:3|string",
            "email" => ['required','email' ,Rule::unique("schools")->ignore($this->id) ],
            "phone" => ['required', new PhoneValidationRule()],
            'area_id' => 'required|exists:areas,id',
            "establish_date" => "required|date|before:today",
            "desc" => 'string|nullable',
            "mission" => "string|nullable",
            "vision" => 'string|nullable',
            "edu_systems_id" => 'required|exists:edu_systems,id',
            "facebook" => "nullable|url",
            "twitter" => "nullable|url",
            "linkedin" => "nullable|url",
            "image" => "image|mimes:jpg,png,jpeg|max:2048|nullable" 
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

          //session()->flash("success" , "data updated successfully");
                  

    }
}
