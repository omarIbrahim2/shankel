<?php

namespace App\Http\Livewire\Web\Suppliers;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;
use App\Http\Livewire\Traits\SearchTrait;
class AreaKgs extends Component
{
    use WithPagination , SearchTrait;

    public $searchKgs;
    public function render(SupplierService $supplierService)
    {
        $query = (new School)->query();

        
        if ($this->searchKgs) {
            $Kgs =  $this->NameOrEmailSearch($this->searchKgs , ['name' => 'name' , 'email'=> 'email'],true, $query);
        }else{
            $Kgs = $supplierService->areaKgs(5);
        } 
        return view('livewire.web.suppliers.area-kgs')->with(['Schools' => $Kgs]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
