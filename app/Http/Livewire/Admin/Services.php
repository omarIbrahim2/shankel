<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;

class Services extends Component
{
    public $supplierId;
    use WithPagination;
    public function render(SupplierService $supplierService)
    {
        $Services = $supplierService->getServices($this->supplierId , 10);
        
        return view('livewire.admin.services')->with(["Services" => $Services ]);
    }


    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
