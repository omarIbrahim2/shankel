<?php

namespace Shankl\Repositories;

use App\Models\School;
use Shankl\Interfaces\UserReboInterface;

class SchoolRepository implements UserReboInterface
{

    public function create($data)
    {

        return School::create($data);
    }



    public function find($schoolId)
    {

        return School::findOrFail($schoolId);
    }

    public function addGrades(array $grades, $schoolId)
    {


        $school =  $this->find($schoolId);
        foreach ($grades as $grade) {

            $school->grades()->attach($grade);
        }
    }
}
