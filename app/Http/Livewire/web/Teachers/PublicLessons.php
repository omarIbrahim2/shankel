<?php

namespace App\Http\Livewire\Web\Teachers;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Services\TeacherService;
use Shankl\Factories\AuthUserFactory;

class PublicLessons extends Component
{
    use WithPagination ;
    public function render(TeacherService $teacherService)
    {
        $teacherId = AuthUserFactory::getAuthUserId();
        $lessons = $teacherService->getLessons($teacherId , 5);
        return view('livewire.web.teachers.public-lessons')->with(['lessons' => $lessons]);
    }

    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
