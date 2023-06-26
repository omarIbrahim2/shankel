<?php

namespace App\Http\Livewire\Web\Schools;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SchoolService;
use App\Http\Livewire\Traits\SearchTrait;
use App\Models\Child;

class Students extends Component
{
    use WithPagination , SearchTrait;

    public $searchStudent;
    public function render(SchoolService $schoolService)
    {
        $query = (new Child())->query();

        if ($this->searchStudent) {
            $Students =  $this->NameOrEmailSearch($this->searchStudent , ['name' => 'name' , 'email'=> 'email'],true, $query);
        }else{
            $Students = $schoolService->AllStudents(10);
        } 

        return view('livewire.web.schools.students')->with(['Students' => $Students]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
