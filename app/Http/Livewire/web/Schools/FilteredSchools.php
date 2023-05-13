<?php

namespace App\Http\Livewire\Web\Schools;

use Livewire\Component;

class FilteredSchools extends Component
{   
    public $Schools;
    public function render()
    {
        return view('livewire.web.schools.filtered-schools');
    }
}
