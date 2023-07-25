<?php

namespace App\Http\Livewire\Web\Comments;

use App\Models\comment;
use Livewire\Component;
use Shankl\Services\SchoolService;
use Illuminate\Support\Facades\Gate;
use Shankl\Factories\AuthUserFactory;

class Comments extends Component
{
    public $school_id;
    public $comment;

    public $AuthUser;
    public $type;

  

    protected $listeners = [
        "fresh" => '$refresh',
    ];

    protected $rules = [
        'comment' => 'required|min:2|string',
    ];
    public function render(SchoolService $schoolService)
    {
        

         $Comments = $schoolService->getComments($this->school_id);
        return view('livewire.web.comments.comments')->with(['Comments' => $Comments]);
    }

    public function mount(){

        $this->AuthUser = AuthUserFactory::getAuthUser();
         $guard = ucfirst(AuthUserFactory::geGuard()) ;
         $this->type = AuthUserFactory::geGuard();
          
         
         
        if ($this->type == 'parent') {
            $this->type = "App\Models" .'\\'.$guard . "t";
         
            
        }elseif ($this->type == 'web') {
            $this->type = 'App\Models\User';
        }else{
            $this->type = "App\Models" .'\\'. $guard;
        }

        
    
    }

    public function to($comment){
        
        $this->dispatchBrowserEvent('comment-added', ['commentInfo' => $comment['comment'] , 'commentId' => $comment['id']]);
    }

    public function createComment(SchoolService $schoolService){
         
       $this->validate(); 
      $user = AuthUserFactory::getAuthUser(); 
      
     
    
       $comment = $schoolService->addComment($user , $this->comment, $this->school_id);

        $this->emit("fresh");

       

        $this->comment = null;

    }

    public function deletecomment($commentId){

        $comment = comment::findOrFail($commentId);
        if (!  Gate::forUser($this->AuthUser)->allows("delete-comment" , [$comment , $this->type]) ) 
        {            
             abort(403);    
        }

         
        $action = $comment->delete();

         if ($action) {
             toastr("deleted successfully" ,"warning" , "Delete comment");
             return;
         }

         
         toastr("Error happened .. !" ,"error" );
            
    }

 

    public function updateComment($commentId){
        $comment = comment::findOrFail($commentId);

        if (!  Gate::forUser($this->AuthUser)->allows("update-comment" , [$comment , $this->type]) ) 
        {            
             abort(403);    
        }
       
        

        

         
    }
}
