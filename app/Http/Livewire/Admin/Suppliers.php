<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;
use App\Http\Livewire\Traits\SearchTrait;

class Suppliers extends Component
{
    use WithPagination ,SearchTrait;
    public $active;
    public $guard = "supplier";
    public $NameOrEmail;
    
    public function render(SupplierService $supplierService)
    {

        $query = (new Supplier())->query();
        if ($this->active == true) {
            $Users =  $supplierService->getActiveSubbliers(10);
        }else{
            $Users = $supplierService->getUnActiveSuppliers(10);
        }
        if ($this->NameOrEmail) {
            $Users = $this->NameOrEmailSearch($this->NameOrEmail , ['name' => 'name' , 'email'=> 'email'] ,true , $query );
         }

        return view('livewire.admin.suppliers')->with(['Users' => $Users]);
    }



    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
