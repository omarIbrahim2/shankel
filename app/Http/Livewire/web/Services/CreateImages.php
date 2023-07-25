<?php

namespace App\Http\Livewire\Web\Services;

use Livewire\Component;
use Livewire\WithFileUploads;
use Shankl\Repositories\ServiceImagesRepo;


class CreateImages extends Component
{
    use WithFileUploads;
    protected $rules =["image.*" => 'image|mimes:jpg,png,jpeg,webp|max:2048|nullable'];

    public $image = [];

    public $Service;

    public $service_id;

    
    public function render()
    {
        return view('livewire.web.services.create-images');
    }

    public function mount(){
       
        $this->service_id = $this->Service->id;

    }

    public function save(ServiceImagesRepo $serviceImagesRepo) {
      
        

       if($serviceImagesRepo->create($this->image , $this->Service->id)){

        
                     
          toastr('images created successfully' , 'success');
          return redirect()->route('web-services');
       } 

       toastr("error in creating image" , 'error');

       $this->image = [];

    }
}
