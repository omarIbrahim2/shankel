<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Shankl\Services\AdminService;
use Livewire\WithPagination;

class Sliders extends Component
{
    use WithPagination;
    public function render(AdminService $adminService)
    {
        $Sliderscollection = $adminService->getSliders();
         $Sliders= Slider::paginate($Sliderscollection , 10);
         
        return view('livewire.admin.sliders')->with(['Sliders' => $Sliders]);
    }


    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
