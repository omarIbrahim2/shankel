<?php

namespace App\View\Components;

use Livewire\WithFileUploads;
use Illuminate\View\Component;
use Shankl\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Shankl\Interfaces\LocationRepoInterface;
use App\Http\Requests\EventValidationRequest;
use Shankl\Services\AdminService;

class AddEventForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    use WithFileUploads;
    public $attributes= array() , $eventable_type ,$eventable_id , $area_id ,$locationRepo, $AdminService;
    public $title, $desc ,$image , $status ,$start_date ,$end_date,$start_time ,$end_time ;
    public static $defaultImage = "assets/images/events/event1.webp";

    public function __construct(LocationRepoInterface $locationRepo , AdminService $AdminService)
    {
        $this->locationRepo = $locationRepo;
        $this->AdminService = $AdminService;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $cities = $this->locationRepo->getCities();

        return view('components.event-form')->with(['cities' => $cities]);
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
