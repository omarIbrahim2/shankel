<?php

namespace App\Http\Livewire\Web\Teachers;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\TeacherService;

class AllTeachers extends Component
{
    use WithPagination;
    public function render(TeacherService $teacherService)
    {
        $teachers =$teacherService->getActiveTeachers(9);
        
        return view('livewire.web.teachers.all-teachers')->with(["teachers" => $teachers]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
