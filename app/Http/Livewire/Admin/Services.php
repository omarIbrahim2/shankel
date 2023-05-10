<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\SearchTrait;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;

class Services extends Component
{
    public $supplierId;
    public $searchName;
    use WithPagination;
    use SearchTrait;
    public function render(SupplierService $supplierService)
    {
        $query = (new Service)->query();
        if ($this->searchName) {
           $Services= $this->TitleSearch($this->searchName , "name" ,$query );
        }else{
            $Services = $supplierService->getServices($this->supplierId , 10);
        }
        
        
        return view('livewire.admin.services')->with(["Services" => $Services ]);
    }


    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
