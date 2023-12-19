<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Rules\PhoneValidationRule;
use Shankl\Services\TeacherService;

class EditTeacher extends Component
{
    use WithFileUploads;
    public $authUser;
    public $teacherid;
    public $name_en;
    public $name_ar;
    public $email;
    public $phone;
    public $field_en;
    public $field_ar;
    public $image;
    public $cv;
    public $facebook;
    public $twitter;
    public $linkedin;
    public $profilePic;
    public $attributes = array();

    public $cvName;
    protected $teacherService;

   
    protected $listeners = [
        "fresh" => '$refresh',
    ];

  
    public function render()
    {
        return view('livewire.teacher.edit-teacher');
    }

    public function mount(TeacherService $teacherService){
        $this-> teacherService = $teacherService; 
        $this->intialize();
       
    }


    public function intialize(){
        $this->teacherid = $this->authUser->id;
        $this->name_en = $this->authUser->name('en');
        $this->name_ar = $this->authUser->name('ar');
        $this->email = $this->authUser->email;
        $this->phone = $this->authUser->phone;
        $this->field_en = $this->authUser->field('en');
        $this->field_ar = $this->authUser->field('ar');
        $this->profilePic = $this->authUser->image;
        $this->facebook = $this->authUser->facebook;
        $this->twitter = $this->authUser->twitter;
        $this->linkedin = $this->authUser->linkedin;
        if ($this->authUser->cv != 'null' ) {
              if ($this->authUser->cv != null) {
                $this->authUser->cv = json_decode($this->authUser->cv);
                $this->cvName = $this->authUser->cv->name;
              }
           
        }
 
    }


    public function setAttributes(){
        
        $this->attributes = [
            'id' => $this->teacherid,
            'name' => [
                'en' => $this->name_en ,
                'ar' => $this->name_ar 
            ],
             'email' => $this->email,
             'phone' => $this->phone,
             'field' => [
                'en' => $this->field_en ,
                'ar' => $this->field_ar 
            ],
             'facebook' => $this->facebook,
             'twitter' => $this->twitter,
             'linkedin' => $this->linkedin,
        ];

    }

    public function update(TeacherService $teacherService){

        $this->validate([
            "name_en" => "required|min:3|string",
            "name_ar" => "required|min:3|string",
            "email" => ['required','email' , 'unique:teachers,email,'.$this->teacherid],
            "phone" => ['required', new PhoneValidationRule()],
            'field_en' => 'required|min:3|string',
            'field_ar' => 'required|min:3|string',
            "facebook" => "nullable|url",
            "twitter" => "nullable|url",
            "linkedin" => "nullable|url",
            "image" => "image|mimes:jpg,png,jpeg,webp|max:2048|nullable" ,
            'cv' => 'file|mimes:pdf,docx|nullable',
        ]);

        $this->setAttributes();

       $imagePath = $teacherService->handleUploadProfilePic($this->image , $this->profilePic);
        
       if ($this->authUser->cv != 'null') {
         $this->authUser->cv = json_decode($this->authUser->cv);
       }


       $cvData = $teacherService->handleUploadcv($this->cv , $this->authUser->cv);

       if ($imagePath != null) {
          $this->attributes['image'] = $imagePath;
       }
        
       if ($cvData != null) {
          $this->attributes['cv'] = $cvData;
       }

        $action = $teacherService->updateProfile($this->attributes);
      

        if ($action) {
             toastr(trans('school.succMsg') , "success");
             $this->emit('fresh');
             $this->image = null;
             $this->cv = null;
             return;
        }

        toastr(trans('error.errorMsg') , 'error' , "Error");
        $this->emit('fresh');
        $this->image = null;


    }


}
