<?php

namespace Shankl\Repositories;

use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Shankl\Interfaces\CardInterface;
use Shankl\Interfaces\UserReboInterface;

class SchoolRepository extends AbstractUserRepo implements UserReboInterface , CardInterface
{
    public function getActiveUsers($pages)
    {
        return  School::where('status' , true)->orderBy('id' , 'DESC')->paginate($pages);
    }

    public function getUnActiveUsers($pages)
    {
        return  School::where('status' , false)->orderBy('id' , 'DESC')->paginate($pages);
    }


    public function create($data)
    {

        return School::create($data);
    }



    public function find($schoolId)
    {

        return School::with('images')->findOrFail($schoolId);
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

    public function SchoolGrades($schoolId){
             
        return School::with(['grades'])->findOrFail($schoolId);
    }

    

  
}
