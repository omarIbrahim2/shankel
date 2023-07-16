<?php

namespace App\Http\Livewire\Teacher;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Shankl\Services\TeacherService;
 
class TeacheVideos extends Component
{

    use WithFileUploads;
    
    protected $rules = ['url' => 'required|url' , 'title' => 'required|string|min:3' , 'image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2048'];

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
            'title' => [
                'en' => $this->title_en,
                'ar' => $this->title_ar
            ],
        ];

        

    }


    public function save(TeacherService $teacherService){
          
         $this->validate();

         $this->setAttributes();

        $this->attributes['image'] =  $teacherService->handleUploadLessonPic($this->image , null);

        $lesson= $teacherService->AddLesson($this->attributes);

        if ($lesson) {
            
            toastr("Lesson Add Successfully" , "success");
        }else {
            toastr("Lesson Add Faild" , 'success');
        }

        

        $this->url = "";
        $this->title_en = "";
        $this->title_ar = "";

    }

    private function evaluateData($request)
    {
        $data = array();
        if (array_key_exists('id', $request)) {

            $data['id'] = $request['id'];
        }
        $data['title'] = json_encode([
            'en' => $request['title_en'],
            'ar' => $request['title_ar'],
        ]);
        return $data;
    }

}
