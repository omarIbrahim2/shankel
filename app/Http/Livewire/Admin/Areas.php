<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\SearchTrait;
use App\Models\Area;
use Shankl\Interfaces\LocationRepoInterface;

class Areas extends Component
{
    use WithPagination , SearchTrait;
    public $searchAreas , $cityId;
    public function render(LocationRepoInterface $locationRepo)
    {
        $AreasQuery = (new Area)->query();
        if ($this->searchAreas) {
            $Areas = $this->TitleSearch($this->searchAreas, 'name', $AreasQuery);
        } else {
            $City = $locationRepo->cityAreas($this->cityId);
             $Areas= Area::paginate($City->areas , 10);  
        }
        return view('livewire.admin.areas')->with(['Areas' => $Areas , 'City' => $City]);
    }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
