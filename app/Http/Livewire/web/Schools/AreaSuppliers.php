<?php

namespace App\Http\Livewire\Web\Schools;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\SearchTrait;
use App\Models\Supplier;
use Shankl\Services\SchoolService;

class AreaSuppliers extends Component
{
    use WithPagination , SearchTrait;

    public $searchSupplier;
    public function render(SchoolService $schoolService)
    {
        $query = (new Supplier())->query();

        if ($this->searchSupplier) {
            $Suppliers =  $this->NameOrEmailSearch($this->searchSupplier , ['name' => 'name' , 'email'=> 'email'],true, $query);
        }else{
            $Suppliers = $schoolService->areaSuppliers(10);
        } 

        return view('livewire.web.schools.area-suppliers')->with(['Suppliers' => $Suppliers]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
