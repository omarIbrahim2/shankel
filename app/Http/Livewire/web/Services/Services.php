<?php

namespace App\Http\Livewire\Web\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    public function render()
    {
        $allServices = Service::get();

        $Services = Service::paginate($allServices , 10);
        return view('livewire.web.services.services')->with(['Services' => $Services]);
    }

      
    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
