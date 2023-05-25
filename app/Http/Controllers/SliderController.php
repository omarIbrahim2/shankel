<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddReq;
use App\Http\Requests\SliderUpdateReq;
use App\Traits\HandleUpload;
use Illuminate\Http\Request;
use Shankl\Services\AdminService;
use Shankl\Services\FileService;

class SliderController extends Controller
{
    use HandleUpload;
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

        $data['image'] =$this->handleUpload($request , $this->fileService , null , 'sliders' );
      

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

        $data['image'] =  $this->handleUpload($request , $this->fileService , $slider , "sliders");       


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

    public function show($sliderId){
       
        $Slider = $this->adminService->getSlider($sliderId);

        if ($Slider) {
            return view('admin.sliders.slidersDetails')->with(['Slider' => $Slider]);
        }

        return back();


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
