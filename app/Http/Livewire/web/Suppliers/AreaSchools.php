<?php

namespace App\Http\Livewire\Web\Suppliers;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;
use App\Http\Livewire\Traits\SearchTrait;

class AreaSchools extends Component
{
    use WithPagination , SearchTrait;

    public $searchSchool;
    public function render(SupplierService $supplierService)
    {
        $query = (new School)->query();

        
        if ($this->searchSchool) {
            $Schools =  $this->NameOrEmailSearch($this->searchSchool , ['name_en' => 'name->en' , 'name_ar' => 'name->ar'  ,'email'=> 'email'],true, $query);
        }else{
            $Schools = $supplierService->areaSchools(5);
        } 
        return view('livewire.web.suppliers.area-schools')->with(['Schools' => $Schools]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
