<?php

namespace App\Http\Livewire\Parent;

use App\Models\Child;
use Livewire\Component;
use Livewire\WithFileUploads;
use Shankl\Services\FileService;
use Shankl\Services\ParentService;

class UpdateChildParent extends Component
{
    use WithFileUploads;
    public $children;
    
    public $grades;
    public $name;
    protected $parentService;
    public $birth_date;
    public $age;
    public $grade_id;
    public $child_id;
    public $gender;
   public $image;

   public $imagePath;
  
   protected $fileService;
    public $attributes = array();

    protected $rules =[
      'name' => 'required|string|min:3',
      'age' => 'required|numeric',
      'birth_date' => 'required',
      'grade_id' => 'required|numeric| exists:grades,id',
      'image' => "nullable|image|mimes:jpg,png,jpeg|max:2048"
    ];

    protected $listeners = [
        "fresh" => '$refresh',
    ];
   
    public function render()
    {
        return view('livewire.parent.update-child-parent');
    }

    public function mount(ParentService $parentService , FileService $fileService){

        $this->parentService = $parentService;
        $this->fileService = $fileService;
    }

    public function fillInputs($child){

        $this->name = $child['name'];
        $this->age = $child['age'] . " years";
        $this->birth_date = $child['birth_date'];
        $this->grade_id = $child['grade_id'];
        $this->child_id = $child['id'];
        $this->gender = $child['gender'];
        $this->imagePath = $child['image'];
        
    }

    public function setAttributes(){

         $this->attributes = [
            'name' => $this->name,
            'age' => substr($this->age , 0 , 1),
            'birth_date' => $this->birth_date,
            "grade_id" => $this->grade_id,
            'gender' => $this->gender,
        
         ];
    }


    public function update(ParentService $parentService , FileService $fileService){
          
       $this->validate();

        $this->setAttributes();
        
        $this->parentService = $parentService;
        
        if ($this->image != null) {
            
             if ($this->imagePath != null) {
                $deleted = substr($this->imagePath , 8);
                 $fileService->DeleteFile($deleted);
             }
            
            $fileService->setPath("childs");

            $fileService->setFile($this->image);

           $this->attributes['image'] =  $fileService->uploadFile();
       }

       $this->parentService->updateChild($this->attributes ,  $this->child_id );      
       $this->emit("fresh");
       $this->image = null;
       session()->flash("success" , "data updated successfully");

    }

    public function delete($childId , ParentService $parentService){
         

        $parentService->deleteChild($childId);

        $this->emit("fresh");

        toastr("child deleted successfully" , "error" , "Deleted");
   
    }



}
