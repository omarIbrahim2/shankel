<?php

namespace App\View\Components;

use App\Models\Information;
use Illuminate\View\Component;

class aboutUsSection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {
    
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $Infos = Information::select('image', 'mission', 'vision', 'title', 'aboutUs', 'choose')->first();
        return view('components.about-us-section')->with(['Infos' => $Infos]);
    }
}
