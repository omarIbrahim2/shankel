<?php
namespace Shankl\Repositories;

use App\Models\Grade;
use Shankl\Interfaces\GradeRepoInterface;

class GradeRepository implements GradeRepoInterface
{
    public function getGrades()
    {
        return Grade::select('id' , 'name')->get();
    }

    public function create($data) {
        return Grade::create($data);
    }

    public function getGrade($gradeId) {
        return Grade::findOrFail($gradeId);
    }

    public function update($gradeId , $data) {
        $grade = $this->getGrade($gradeId);
        return $grade->update($data);
    }

    public function delete($gradeId){
        $grade = $this->getGrade($gradeId);
        return $grade->delete();
    }
}
