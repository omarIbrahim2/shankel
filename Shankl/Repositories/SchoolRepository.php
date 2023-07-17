<?php

namespace Shankl\Repositories;

use App\Models\Child;
use App\Models\Parentt;
use App\Models\School;
use App\Models\Supplier;
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

    public function getActiveSchools($pages)
    {
        return  School::where('status' , true)
        ->where('type' , 'School')->orderBy('id' , 'DESC')->paginate($pages);
    }

    public function getUnActiveSchools($pages)
    {
        return  School::where('status' , false)
        ->where('type' , 'School')->orderBy('id' , 'DESC')->paginate($pages);
    }

    public function getActiveCenters($pages)
    {
        return  School::where('status' , true)
        ->where('type' , 'Center')->orderBy('id' , 'DESC')->paginate($pages);
    }

    public function getUnActiveCenters($pages)
    {
        return  School::where('status' , false)
        ->where('type' , 'Center')->orderBy('id' , 'DESC')->paginate($pages);
    }

    public function getActiveKGs($pages)
    {
        return  School::where('status' , true)
        ->where('type' , 'KG')->orderBy('id' , 'DESC')->paginate($pages);
    }

    public function getUnActiveKGs($pages)
    {
        return  School::where('status' , false)
        ->where('type' , 'KG')->orderBy('id' , 'DESC')->paginate($pages);
    }


    public function create($data)
    {

        return School::create($data);
    }



    public function find($schoolId)
    {

        return School::with('images')->findOrFail($schoolId);
    }


    public function addGrades(array $grades, $school)
    {

        foreach ($grades as $grade) {

            $school->grades()->attach($grade);
        }
    }

    public function updateGrades(array $grades , $schoolId){
              
        $school =  $this->find($schoolId);
        $school->grades()->sync($grades);
    }

    public function update($data)
    {
         
       $school = $this->find($data["id"]);
        
       
       return  $school->update($data);
    }

    public function SchoolGrades($schoolId){
             
        return School::with(['grades'])->findOrFail($schoolId);
    }

    
    public function getAreaSuppliers($pages){
        $SchoolUserId =  Auth::guard('school')->user()->id;
        $AuthSchool = School::with('area')->findOrFail($SchoolUserId);
        $areaId = $AuthSchool->area->id;
        $areaSuppliers = Supplier::select('id','image','name','type','orgName','area_id')->where('area_id' , $areaId)->paginate($pages);
        return $areaSuppliers;
     }

     public function getAllStudents($pages){
        $SchoolUserId =  Auth::guard('school')->user()->id;
        $students = Child::with(['parentt','grade'])->where("school_id" , $SchoolUserId )->paginate($pages);
        return $students ;
     }

     public function getStudentsParents(){
        $SchoolUserId =  Auth::guard('school')->user()->id;
        $studentsParentsId = Child::with(['parentt','grade'])->where("school_id" , $SchoolUserId )->pluck('parentt_id')->toArray();
        $Parents = Parentt::select('id')->whereIn('id',$studentsParentsId)->get();
        return $Parents;
     }

     public function MostViewedSchools(){
        
      return  School::select('id' , 'image' , 'name' , 'type')->where('status' , true)->orderBy('views' , 'desc')->limit(3)->get();
     }

  
}
