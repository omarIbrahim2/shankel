<?php

namespace App\View\Components;

use App\Models\Information;
use Illuminate\View\Component;

class AboutUsSection extends Component
{
    public $Infos;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {
         $this->Infos = Information::select('image', 'mission', 'vision', 'title', 'aboutUs', 'choose')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
      
    
        return view('components.about-us-section');
    }
}
