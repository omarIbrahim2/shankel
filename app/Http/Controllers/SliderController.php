<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddReq;
use App\Http\Requests\SliderUpdateReq;
use Illuminate\Http\Request;
use Shankl\Services\AdminService;
use Shankl\Services\FileService;

class SliderController extends Controller
{
    private $adminService;
    private $fileService;
    public function __construct(AdminService $adminService , FileService $fileService)
    {
        $this->adminService = $adminService;

        $this->fileService = $fileService;
        
    }

    public function Sliders(){
        return view('admin.sliders.sliders');
    }

    public function create(){

         return view("admin.sliders.create");
    }

    public function edit($sliderId){
         $Slider = $this->adminService->getSlider($sliderId); 
        return view('admin.sliders.update')->with(['Slider' => $Slider]);
    }

    public function store(SliderAddReq $request){

        $validatedReq = $request->validated();
      
        $data = $this->evaluateData($validatedReq);

        $this->fileService->setPath('sliders');
        $this->fileService->setFile($validatedReq['image']);

         $data['image'] =  $this->fileService->uploadFile();

         

        $slider =  $this->adminService->addSlider($data);

        if ($slider) {
              
             toastr("slider created successfully" , 'success' , "create slider");

             return redirect()->route('Sliders');
        }

        toastr("errot in creating slider" , 'error');


    }

    public function update(SliderUpdateReq $request){

        $validatedReq = $request->validated();


        $data = $this->evaluateData($validatedReq);
        
        $slider =  $this->adminService->getSlider($data['id']);

        

        if ($request->has('image')) {
             
            $this->fileService->DeleteFile($slider->image);

            $this->fileService->setPath('sliders');

            $this->fileService->setFile($validatedReq['image']);

           $data['image'] = $this->fileService->uploadFile();

           
        }

       $action =  $this->adminService->updateSlider($data , $validatedReq['id']);

       

       if ($action) {
        
          toastr('slider updated successfully' , 'success' , 'update slider');

          return redirect()->route('Sliders');
       }

       toastr("errot in updating slider" , 'error');


    }

    public function delete($sliderId){
           
         $action = $this->adminService->deleteSlider($sliderId);

         if ($action) {
            toastr('slider deleted successfully' , 'success' , 'delete slider');

            return back();
         }

         toastr("errot in deleting slider" , 'error');


    }

    private function evaluateData($request){
         $data = array();
        if (array_key_exists('id' , $request)) {
            
            $data['id'] = $request['id'];  
        }
        $data['title'] = json_encode([
            'en' => $request['title_en'],
            'ar' => $request['title_ar'],
        ]);
            

            $data['info'] = json_encode([
                'en' => $request['info_en'],
                'ar' => $request['info_ar'],
            ]);
        


        return $data;


    }


    
}
