<?php

namespace App\Http\Livewire\Teacher;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Shankl\Services\TeacherService;
 
class TeacheVideos extends Component
{

    use WithFileUploads;
    
    protected $rules = ['url' => 'required|url' , 'title_en' => 'required|string|min:3','title_ar' => 'required|string|min:3' , 'image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2048'];

    public $url , $title_en, $title_ar , $image;
         
    public $attributes;

    public $AuthUserId;

    protected $listener = [
        'fresh' => '$refresh',
    ];
    public function render(TeacherService $teacherService)
    {
        return view('livewire.teacher.teache-videos');
       
    }

    public function mount(){
         
        $this->AuthUserId = Auth::guard('teacher')->user()->id;


    }


    public function setAttributes(){
         
        $this->attributes = [
            "url" => $this->url,
            "teacher_id" => $this->AuthUserId,
            'title' => json_encode([
                'en' => $this->title_en,
                'ar' => $this->title_ar
            ]),
        ];

        

    }


    public function save(TeacherService $teacherService){
          
         $this->validate();

         $this->setAttributes();

        $this->attributes['image'] =  $teacherService->handleUploadLessonPic($this->image , null);

        $lesson= $teacherService->AddLesson($this->attributes);

        if ($lesson) {
            
            toastr(trans('teacher.lessonAddMsg') , "success");
        }else {
            toastr(trans('error.errorMsg') , 'error');
        }

        

        $this->url = "";
        $this->title_en = "";
        $this->title_ar = "";

    }


}
