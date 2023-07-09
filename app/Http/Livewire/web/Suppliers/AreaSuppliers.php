<?php

namespace App\Http\Livewire\Web\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\SearchTrait;
use Shankl\Services\SupplierService;

class AreaSuppliers extends Component
{
    use WithPagination , SearchTrait;

    public $searchSupplier;
    public function render(SupplierService $supplierService)
    {
        $query = (new Supplier())->query();

        if ($this->searchSupplier) {
            $Suppliers =  $this->NameOrEmailSearch($this->searchSupplier , ['name' => 'name' , 'email'=> 'email'],true, $query);
        }else{
            $Suppliers = $supplierService->areaSuppliers(10);
        } 
        return view('livewire.web.suppliers.area-suppliers')->with(['Suppliers' => $Suppliers]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
