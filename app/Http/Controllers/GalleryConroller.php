<?php

namespace App\Http\Controllers;

use App\Traits\HandleUpload;
use Illuminate\Http\Request;
use Shankl\Services\FileService;
use Shankl\Services\AdminService;
use App\Http\Requests\GalleryAddReq;
use App\Http\Requests\GalleryUpdateReq;
use Shankl\Repositories\GalleryRepository;

class GalleryConroller extends Controller
{
    use HandleUpload;
    private $adminService;
    private $fileService;
    public function __construct(AdminService $adminService , FileService $fileService)
    {
        $this->adminService = $adminService;

        $this->fileService = $fileService;
        
    }


    public function index()
    {
        return view('admin.galleries.index');
    }

    
    public function create(){

         return view("admin.galleries.create");
    }

    public function update($galleryId){
         $image = $this->adminService->getImage($galleryId); 
        return view('admin.galleries.update')->with(['gallery' => $image]);
    }

    public function store(GalleryAddReq $request){

        $validatedData = $request->validated();
        $data = $this->evaluateData($validatedData);
        $data['image'] =$this->handleUpload($request , $this->fileService , null , 'galleries' );
      

        $image =  $this->adminService->addImage($data);

        if ($image) {
              
             toastr("Gallery created successfully" , 'success' , "create Gallery");

             return redirect()->route('gallery');
        }

        toastr("errot in creating gallery" , 'error');


    }

    public function edit(GalleryUpdateReq $request){

        $validatedData = $request->validated();
        $image =  $this->adminService->getImage($validatedData['id']);
        $data = $this->evaluateData($validatedData);
        $data['image'] =  $this->handleUpload($request , $this->fileService , $image , "galleries");       


       $action =  $this->adminService->updateImage($data , $image['id']);

       

       if ($action) {
        
          toastr('Image updated successfully' , 'success' , 'update Image');

          return redirect()->route('gallery');
       }

       toastr("errot in updating gallery" , 'error');


    }

    public function delete($galleryId){
           
         $action = $this->adminService->deleteImage($galleryId);

         if ($action) {
            toastr('Image deleted successfully' , 'success' , 'delete Image');

            return back();
         }

         toastr("errot in deleting Image" , 'error');


    }

    public function show($galleryId){
       
        $image = $this->adminService->getImage($galleryId);

        if ($image) {
            return view('admin.galleries.galleriesDetails')->with(['gallery' => $image]);
        }

        return back();


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
