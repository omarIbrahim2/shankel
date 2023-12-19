<?php

namespace App\Http\Livewire\Web\Suppliers;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;
use App\Http\Livewire\Traits\SearchTrait;

class AreaCenters extends Component
{
    use WithPagination , SearchTrait;

    public $searchCenters;
    public function render(SupplierService $supplierService)
    {
        $query = (new School)->query();

        
        if ($this->searchCenters) {
            $Centers =  $this->NameOrEmailSearch($this->searchCenters , ['name_en' => 'name->en' , 'name_ar' => 'name->ar'  ,'email'=> 'email'],true, $query);
        }else{
            $Centers = $supplierService->areaCenters(5);
        } 
        return view('livewire.web.suppliers.area-centers')->with(['Schools' => $Centers]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
