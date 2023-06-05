<?php

namespace App\Http\Livewire\Teacher;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Shankl\Services\TeacherService;

class TeacheVideos extends Component
{

    
    protected $rules = ['url' => 'required|url'];

    public $url;
     
    public $attributes;

    public $AuthUserId;

    protected $listener = [
        'fresh' => '$refresh',
    ];
    public function render(TeacherService $teacherService)
    {
          $videos = $teacherService->getLessons($this->AuthUserId);
        
        return view('livewire.teacher.teache-videos')->with(['videos' => $videos]);
    }

    public function mount(){
         
        $this->AuthUserId = Auth::guard('teacher')->user()->id;


    }


    public function setAttributes(){
         
        $this->attributes = [
            "url" => $this->url,
            "teacher_id" => $this->AuthUserId,
        ];

        

    }


    public function save(TeacherService $teacherService){
          
         $this->validate();

         $this->setAttributes();

        $lesson= $teacherService->AddLesson($this->attributes);

        if ($lesson) {
            
            toastr("Lesson Add Successfully" , "success");
        }else {
            toastr("Lesson Add Faild" , 'success');
        }

        $this->emit('fresh');

        $this->url = "";


    }


}
