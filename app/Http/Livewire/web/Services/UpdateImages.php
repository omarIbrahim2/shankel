<?php

namespace App\Http\Livewire\Web\Services;

use Livewire\Component;
use Livewire\WithFileUploads;
use Shankl\Repositories\ServiceImagesRepo;

class UpdateImages extends Component
{
    use WithFileUploads;

    public  $Service;

     public $images;
    protected $rules =["images.*" => 'required|image|mimes:jpg,png,jpeg,webp|max:2048'];

    protected $listeners = ['fresh' => '$refresh'];
    public function render()
    {
        return view('livewire.web.services.update-images')->with(['Service' => $this->Service]);
    }


    public function upload(ServiceImagesRepo $serviceImagesRepo){
          
        $this->validate();

        if (  $serviceImagesRepo->create($this->images , $this->Service->id)) {
            toastr(trans('school.schoolImgsMsg') , 'success');

            $this->emit('fresh');

            $this->images = [];
        }else{

            toastr(trans('error.errorMsg') , 'error');

            $this->images = [];
        }
      

    }



  
}
