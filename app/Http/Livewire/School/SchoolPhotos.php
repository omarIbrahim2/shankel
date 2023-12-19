<?php

namespace App\Http\Livewire\School;

use App\Models\Image;
use Livewire\Component;
use Shankl\Services\FileService;
use Livewire\WithFileUploads;


class SchoolPhotos extends Component
{
    use WithFileUploads;

    protected $listeners = ["imageUpload" => "getImages"];
    public $images;

    public $AuthUser;

    public $photos = [];

    protected $rules =["photos.*" => 'image|mimes:jpg,png,jpeg,webp|max:2048|nullable'];
    public function render()
    {
        return view('livewire.school.school-photos')->with([
            "images" => $this->images,
        ]);
    }

    public function mount(){
       
        $this->getImages();


     
    }

    public function getImages(){
      
       $this->images = $this->AuthUser->images;
         
    }

    public function upload(FileService $fileService){
       
        $this->validate();

        foreach($this->photos as $photo){

            $fileService->setPath("schools");

            $fileService->setFile($photo);
            
           $imagePath = $fileService->uploadFile();

            Image::create([
                'school_id'=> $this->AuthUser->id,
                "name" => $imagePath,
            ]);
        }
        $this->photos = [];
        $this->emit("imageUpload");
          
        toastr(trans('school.schoolImgsMsg') , "success");

        
    }

    public function delete($imageid , FileService $fileService){

       $image = Image::findOrFail($imageid);
        
    
       $fileService->DeleteFile(substr($image->name , 8));

       $image->delete();
       $this->emit("imageUpload");
       toastr(trans('school.imgsDeleteMsg') , "error" , "Delete");
    }
}