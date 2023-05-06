<?php

namespace App\Http\Livewire\Web\Schools;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\SchoolService;

class Schools extends Component
{
    use WithPagination;
    public function render(SchoolService $schoolService)
    {
        $Schools = $schoolService->getAllSchools(5);
        
        
        
        return view('livewire.web.schools.schools')->with(['Schools' => $Schools]);
    }


    
    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
