<?php

namespace App\Http\Livewire\Web\Parents;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\ParentService;

class ReservedSchools extends Component
{
    use WithPagination;
    public function render(ParentService $parentService)
    {
        $Schools = $parentService->reservedSchools(5);
        return view('livewire.web.parents.reserved-schools')->with(['Schools' => $Schools]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
