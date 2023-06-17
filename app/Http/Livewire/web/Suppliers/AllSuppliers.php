<?php

namespace App\Http\Livewire\Web\Suppliers;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;

class AllSuppliers extends Component
{
    use WithPagination;
    public function render(SupplierService $supplierService)
    {
        $suppliers = $supplierService->getActiveSubbliers(12);
        return view('livewire.web.suppliers.all-suppliers')->with(["suppliers" => $suppliers]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
