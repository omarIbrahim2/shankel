<?php
namespace Shankl\Repositories;

use App\Models\Teacher;
use Shankl\Interfaces\UserReboInterface;

class TeacherRepository implements UserReboInterface{
    public function create($data)
    {
        $teacher = Teacher::create($data);
        return $teacher;
    }

    public function find($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        return $teacher;
    }

    public function update($data)
    {
        $teacher = $this->find($data['id']);

         return $teacher->update($data);
    }
}