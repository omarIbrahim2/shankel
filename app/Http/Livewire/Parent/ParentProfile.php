<?php

namespace App\Http\Livewire\Parent;

use Illuminate\Http\Request;
use Livewire\Component;
use Shankl\Services\ParentService;

class ParentProfile extends Component
{
   

   public $attributes = array();

    private $parentService;
    public function render()
    {
        return view('livewire.parent.parent-profile');
    }

    public function mount(ParentService $parentService){
      
        $this->parentService = $parentService;
    }

    public function save(){
      
      $action = $this->parentService->update($this->attributes);

      if ($action) {
         return back()->with([
            "success" => "data updated successfully",
         ]);
      }else{
          return back()
          ->withInput()
          ->withErrors('error' , "failed to update ..!!");
      }

    }
}
