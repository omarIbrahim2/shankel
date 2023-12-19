<?php

namespace App\View\Components;


use Illuminate\View\Component;


class lang extends Component
{

    /**
     * Create a new component instance
     * 
     * @return void
     */

     public function __construct()
     {
        //
     }


    /**
     * Get the view / contents that represent the component
     * 
     * @return \Illuninate\Contracts\View|\Closure|string
     */

     public function render()
     {
        return view('components.lang');
     }

}

