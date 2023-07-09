<?php

namespace App\Http\Livewire\Web\Suppliers;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Factories\AuthUserFactory;
use Shankl\Services\SupplierService;

class SupplierServices extends Component
{
    use WithPagination ;
    public function render(SupplierService $supplierService)
    {
        $supplierId = AuthUserFactory::getAuthUserId();
        $Services = $supplierService->getServices($supplierId , 5);

        return view('livewire.web.suppliers.supplier-services')->with(['Services' => $Services]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
