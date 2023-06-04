<?php

namespace Shankl\Repositories;

use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Shankl\Interfaces\CardInterface;
use Shankl\Interfaces\UserReboInterface;

class SchoolRepository implements UserReboInterface , CardInterface
{
    public function getActiveUsers($pages)
    {
        return  School::where('status' , true)->paginate($pages);
    }

    public function getUnActiveUsers($pages)
    {
        return  School::where('status' , false)->paginate($pages);
    }


    public function create($data)
    {

        return School::create($data);
    }



    public function find($schoolId)
    {

        return School::with('images')->findOrFail($schoolId);
    }


    public function addToCard($school , $serviceId){

        $schoolCard =   $school->card;

        if ($schoolCard == null) {
              
          $createdCard =   $school->card()->create([
                 "user_id" => $school->id,
             ]);

           return $createdCard->attach([$serviceId]);  
        }else{

          return  $schoolCard->attach([$serviceId]);
        }

   }

   public function RemoveFromCard( $parent,$serviceId){


   }

   public function getCardWithServices()
   {
    
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
