<?php

namespace App\Http\Livewire\Admin;

use App\Models\Information;
use Livewire\Component;

class Info extends Component
{

    public function render()
    {
        $Infos = Information::select('id' , 'title' , 'image')->first();
        return view('livewire.admin.info')->with(['Infos' => $Infos]);
    }


  
}
