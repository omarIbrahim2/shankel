<?php
namespace Shankl\Repositories;

use App\Models\Lesson;
use App\Models\Teacher;
use Shankl\Interfaces\CardInterface;
use Shankl\Interfaces\UserReboInterface;

class TeacherRepository extends AbstractUserRepo implements UserReboInterface , CardInterface{

    public function getActiveUsers($pages)
    {
       return Teacher::with('area')->where('status' , true)->orderBy('created_at' , 'DESC')->paginate($pages); 
    }

    public function getUnActiveUsers($pages)
    {
       return Teacher::where('status' , false)->orderBy('created_at' , 'DESC')->paginate($pages); 
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


    public function getLesson($lessonId){

        return Lesson::findOrFail($lessonId);
    }

   public function AddLesson($data){

      return Lesson::create($data);
   }

   public function getLessons($teacherId , $pages){

      return Lesson::with(['teacher'] , function($query){
        $query->select('field')->first();
      })->select('id' , 'url','type' ,'title' ,'image' ,'teacher_id')->where('teacher_id', $teacherId )->where('type' , 'Public')->paginate($pages);
   }


   public function deleteLesson($lesson){
   
      return $lesson->delete();
   }

   public function updateLesson($lesson , $data){
      

    return  $lesson->update($data);

      
   }




    public function update($data)
    {
        $teacher = $this->find($data['id']);

         return $teacher->update($data);
    }
}