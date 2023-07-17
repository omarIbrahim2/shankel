<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Repositories\EduSystemRepository;

class EduSystems extends Component
{
    use WithPagination;

    public function render(EduSystemRepository $eduSystemRepo)
    {
        $eduSystems = $eduSystemRepo->getEduSystems();
        return view('livewire.admin.edu-systems')->with(['eduSystems' => $eduSystems]);
    }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
