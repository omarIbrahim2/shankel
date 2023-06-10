<?php

namespace App\Http\Livewire\School;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Shankl\Services\FileService;
use Shankl\Services\SchoolService;
use Illuminate\Support\Facades\Auth;
use Shankl\Interfaces\LocationRepoInterface;
use App\Http\Requests\EventValidationRequest;


class AddEventForm extends Component
{
    use WithFileUploads;
    public $attributes= array() , $eventable_type ,$eventable_id , $area_id;
    public $title, $desc ,$image , $status ,$start_date ,$end_date,$start_time ,$end_time ;
    public static $defaultImage = "assets/images/events/event1.webp";

    public function render(LocationRepoInterface $locationRepo)
    {
        $data['cities'] = $locationRepo->getCities();
        return view('livewire.school.add-event-form')->with($data);
    }

    public function mount()
    {
        $this->eventable_id = Auth::guard('school')->user()->id;
        $this->eventable_id = User::class;
    }


    public function setAttributes(){

        $this->attributes = [
            'eventable_type' => $this->eventable_type,
            'eventable_id' => $this->eventable_id,
            'title' => $this->title,
            'desc' => $this->desc,
            'image' => $this->image, 
            'status' => $this->status, 
            'start_date' => $this->start_date, 
            'end_date' => $this->end_date, 
            'start_time' => $this->start_time, 
            'end_time' => $this->end_time, 
            'area_id' => $this->area_id, 
        ];
    }

    public function resetInputs(){
        $this->title = '';
        $this->status = '';
        $this->desc = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->start_time = '';
        $this->end_time = '';
    }

    public function save(EventValidationRequest $request , FileService $fileService){
       
        $validatedData = $this->$request->validated();
       
        $validatedData =$this->setAttributes();

         
       if ($request->has('image')) {
         
         $fileService->setPath('events');
 
         $fileService->setFile($request->image);
  
         $validatedData['image'] = $fileService->uploadFile();
       }
      
 
 
          $event =$this->AdminService->addEvent($this->attributes);
 
          if ($event) {
             toastr("event created successfully" , "success");
             return redirect()->route("admin-events");
          }
 
          toastr("error in creation " , "error" , "Error");
 
        $this->resetInputs();

     }

}
