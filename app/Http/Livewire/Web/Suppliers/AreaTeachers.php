<?php

namespace App\Http\Livewire\Web\Suppliers;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SupplierService;
use App\Http\Livewire\Traits\SearchTrait;

class AreaTeachers extends Component
{
    use WithPagination , SearchTrait;

    public $searchTeacher;
    public function render(SupplierService $supplierService)
    {
        $query = (new School)->query();

        
        if ($this->searchTeacher) {
            $teachers =  $this->NameOrEmailSearch($this->searchTeacher ,  ['name_en' => 'name->en' , 'name_ar' => 'name->ar'  ,'email'=> 'email'],true, $query);
        }else{
            $teachers = $supplierService->areaTeachers(5);
        } 
        return view('livewire.web.suppliers.area-teachers')->with(['teachers' => $teachers]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
