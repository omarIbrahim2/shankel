<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\SearchTrait;
use Shankl\Interfaces\LocationRepoInterface;

class Cities extends Component
{
    use WithPagination , SearchTrait;
    public $searchCities;
    public function render(LocationRepoInterface $locationRepo)
    {
        $CitiesQuery = (new City)->query();
        if ($this->searchCities) {
            $keys = ['name->ar' , 'name->en'];
            $Cities = $this->TitleSearch($this->searchCities, $keys, $CitiesQuery);
        } else {
            $Cities = $locationRepo->cities();
        }

        return view('livewire.admin.cities')->with(['Cities' => $Cities]);
    }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
