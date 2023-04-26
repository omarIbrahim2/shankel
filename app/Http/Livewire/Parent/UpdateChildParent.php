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
  
   protected $fileService;
    public $attributes = array();

    protected $rules =[
      'name' => 'required|min:3',
      'age' => 'required',
      'birth_date' => 'required',
      'grade_id' => 'required| exists:grades,id',
      'image' => "nullable|image|mimes:jpg,png,jpeg|max:2048"
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


    public function update(ParentService $parentService){
          
       $this->validate();

        $this->setAttributes();
        
        $this->parentService = $parentService;
        


       $this->parentService->updateChild($this->attributes ,  $this->child_id );      
       
       session()->flash("success" , "data updated successfully");

    }



}
