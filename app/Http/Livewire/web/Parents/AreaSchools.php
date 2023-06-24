<?php

namespace App\Http\Livewire\Web\Parents;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SchoolService;
use App\Http\Livewire\Traits\SearchTrait;
use Shankl\Services\ParentService;

class AreaSchools extends Component
{
    use WithPagination , SearchTrait;

    public $searchSchool;
    public function render(ParentService $parentService)
    {
        $query = (new School)->query();

        
        if ($this->searchSchool) {
            $Schools =  $this->NameOrEmailSearch($this->searchSchool , ['name' => 'name' , 'email'=> 'email'],true, $query);
        }else{
            $Schools = $parentService->areaSchools(5);
        } 
        return view('livewire.web.parents.area-schools')->with(['Schools' => $Schools]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
