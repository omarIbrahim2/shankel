<?php

namespace App\Http\Livewire\Web\Comments;

use Livewire\Component;
use Shankl\Factories\AuthUserFactory;
use Shankl\Services\SchoolService;

class Comments extends Component
{
    public $school_id;
    public $commented;

    protected $listeners = [
        "fresh" => '$refresh',
    ];
    public function render(SchoolService $schoolService)
    {
        

         $Comments = $schoolService->getComments($this->school_id);
        return view('livewire.web.comments.comments')->with(['Comments' => $Comments]);
    }

    public function createComment(SchoolService $schoolService){
         
      $user = AuthUserFactory::getAuthUser(); 
      
      if ($this->commented == null) {
         return;
      }
    
        $schoolService->addComment($user , $this->commented , $this->school_id);

        $this->emit("fresh");

        $this->commented = null;

    }
}
