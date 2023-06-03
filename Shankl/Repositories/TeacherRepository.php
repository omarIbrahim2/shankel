<?php
namespace Shankl\Repositories;

use App\Models\Teacher;
use Shankl\Interfaces\CardInterface;
use Shankl\Interfaces\UserReboInterface;

class TeacherRepository implements UserReboInterface , CardInterface{

    public function getActiveUsers($pages)
    {
       return Teacher::where('status' , true)->paginate($pages); 
    }

    public function getUnActiveUsers($pages)
    {
       return Teacher::where('status' , false)->paginate($pages); 
    }
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

    public function addToCard($teacher , $serviceId){

        $teacherCard =   $teacher->card;

        if ($teacherCard == null) {
              
          $createdCard =   $teacher->card()->create([
                 "user_id" => $teacher->id,
             ]);

           return $createdCard->attach([$serviceId]);  
        }else{

          return  $teacherCard->attach([$serviceId]);
        }

   }

    public function update($data)
    {
        $teacher = $this->find($data['id']);

         return $teacher->update($data);
    }
}