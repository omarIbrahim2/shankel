<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Repositories\GradeRepository;

class Grades extends Component
{
    use WithPagination;

    public function render(GradeRepository $gradeRepo)
    {
        $grades = $gradeRepo->getGrades();
        return view('livewire.admin.grades')->with(['grades' => $grades]);
    }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
