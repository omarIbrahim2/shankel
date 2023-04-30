<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class EditTeacher extends Component
{
    public $authUser;
    public function render()
    {
        return view('livewire.teacher.edit-teacher');
    }
}
