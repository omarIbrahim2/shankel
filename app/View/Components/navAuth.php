<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class NavAuth extends Component
{
    public $guard;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->guard = $this->getGuard();

        
    }

    public function getGuard(){
          
        if(Auth::guard('parent')->check()){
               
            return "parent";
        }elseif(Auth::guard('school')->check()){
              
            return "school";
        }elseif(Auth::guard('teacher')->check()){
             
             return "teacher";
        }elseif(Auth::guard('web')->check()){
               
            return 'web';
        }elseif(Auth::guard('supplier')->check()){
             
             return 'supplier';
        }
         
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-auth')->with(['guard' => $this->guard]);
    }
}
