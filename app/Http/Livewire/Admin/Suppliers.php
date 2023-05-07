<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;

class Suppliers extends Component
{
    use WithPagination;
    public $active;
    public $guard = "supplier";

    public function render(SupplierService $supplierService)
    {
        if ($this->active == true) {
            $Users =  $supplierService->getActiveSubbliers(10);
        }else{
            $Users = $supplierService->getUnActiveSuppliers(10);
        }
        return view('livewire.admin.suppliers')->with(['Users' => $Users]);
    }



    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
