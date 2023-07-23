<?php

namespace App\Http\Livewire\Web\Services;

use Livewire\Component;
use Livewire\WithFileUploads;
use Shankl\Repositories\ServiceImagesRepo;


class CreateImages extends Component
{
    use WithFileUploads;
    protected $rules =["photos.*" => 'image|mimes:jpg,png,jpeg,webp|max:2048|nullable'];

    public $image = [];

    public $service;
    public function render()
    {
        return view('livewire.web.services.create-images');
    }

    public function save(ServiceImagesRepo $serviceImagesRepo) {


       if($serviceImagesRepo->create($this->image , $this->service->id)){
                     
          toastr('images created successfully' , 'success');
          return redirect()->to('web-services');
       } 

       toastr("error in creating image" , 'error');

       $this->image = [];

    }
}
