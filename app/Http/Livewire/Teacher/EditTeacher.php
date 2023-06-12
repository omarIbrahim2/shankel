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
    public $name;
    public $email;
    public $phone;
    public $field;
    public $image;
    public $cv;
    public $facebook;
    public $twitter;
    public $linkedin;
    public $profilePic;
    public $attributes = array();
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
        $this->name = $this->authUser->name;
        $this->email = $this->authUser->email;
        $this->phone = $this->authUser->phone;
        $this->field = $this->authUser->field;
        $this->profilePic = $this->authUser->image;
        $this->facebook = $this->authUser->facebook;
        $this->twitter = $this->authUser->twitter;
        $this->linkedin = $this->authUser->linkedin;
    }

    public function setAttributes(){
        
        $this->attributes = [
            'id' => $this->teacherid,
            'name' => $this->name,
             'email' => $this->email,
             'phone' => $this->phone,
             'field' => $this->field,
             'facebook' => $this->facebook,
             'twitter' => $this->twitter,
             'linkedin' => $this->linkedin
        ];

    }

    public function update(TeacherService $teacherService){

        $this->validate([
            "name" => "required|min:3|string",
            "email" => ['required','email' , 'unique:teachers,email,'.$this->teacherid],
            "phone" => ['required', new PhoneValidationRule()],
            'field' => 'required|min:3|string',
            "facebook" => "nullable|url",
            "twitter" => "nullable|url",
            "linkedin" => "nullable|url",
            "image" => "image|mimes:jpg,png,jpeg,webp|max:2048|nullable" ,
            'cv' => 'file|mimes:pdf,docx|nullable',
        ]);

        $this->setAttributes();

       $imagePath = $teacherService->handleUploadProfilePic($this->image , $this->profilePic);

       $cvPath = $teacherService->handleUploadcv($this->cv);

       if ($imagePath != null) {
          $this->attributes['image'] = $imagePath;
       }


        $action = $teacherService->updateProfile($this->attributes);
      

        if ($action) {
             toastr("data updated successfully" , "success");
             $this->emit('fresh');
             $this->image = null;
             return;
        }

        toastr("error happened in system ..!!" , 'error' , "Error");
        $this->emit('fresh');
        $this->image = null;


    }


}
