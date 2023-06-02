<?php

namespace App\Http\Livewire\Web\Addverts;

use Livewire\Component;
use Shankl\Interfaces\AddvertRepoInterface;

class Addverts extends Component
{
    public function render(AddvertRepoInterface $addvertRebo)
    {
        $Addverts = $addvertRebo->getAddverts(10);
        return view('livewire.web.addverts.addverts')->with(['addverts' => $Addverts]);
    }
}
