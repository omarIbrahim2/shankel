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
}
