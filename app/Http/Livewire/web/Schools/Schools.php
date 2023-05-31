<?php

namespace App\Http\Livewire\Web\Schools;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SchoolService;
use App\Http\Livewire\Traits\SearchTrait;

class Schools extends Component
{
    use WithPagination;
    use SearchTrait;

    public $searchSchool;
    public function render(SchoolService $schoolService)
    {

        $query = (new School)->query();

        
        if ($this->searchSchool) {
            $Schools =  $this->NameOrEmailSearch($this->searchSchool , ['name' => 'name' , 'email'=> 'email'],true, $query);
        }else{

            $Schools = $schoolService->getActiveSchools(5);
        } 
        
        return view('livewire.Web.schools.schools')->with(['Schools' => $Schools]);
    }


    
    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
