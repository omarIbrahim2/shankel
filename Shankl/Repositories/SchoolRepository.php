<?php

namespace Shankl\Repositories;

use App\Models\School;
use Illuminate\Support\Facades\Auth;
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

    public function updateGrades(array $grades , $schoolId){
              
        $school =  $this->find($schoolId);
    

        $school->grades()->sync($grades);
        // foreach($grades as $grade){
             
        //     $school->grades()->sync($grade);
        // }

    }

    public function update($data)
    {
         
       $school = $this->find($data["id"]);
        
       
       return  $school->update($data);
    }
}
