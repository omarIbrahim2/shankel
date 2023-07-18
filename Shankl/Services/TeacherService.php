<?php

namespace Shankl\Services;

use App\Models\Lesson;
use App\Models\Teacher;

use Shankl\Interfaces\EventRepoInterface;
use Shankl\Repositories\TeacherRepository;

class TeacherService extends Service{

    private $teacherRebo;

    private $fileservice;

    private static $defaultProfilePath = "assets/images/logo/user.png";
    private static $defaultLessonPathPic = "assets/images/teachers/5.webp";

    private $EventRepo;

    

    public function __construct(TeacherRepository $teacherRebo , FileService $fileService , EventRepoInterface $EventRepo)
    {
        $this->teacherRebo = $teacherRebo;
        $this->fileservice = $fileService;
        $this->EventRepo = $EventRepo;
    }

    public function getActiveTeachers($pages){
           
         return $this->teacherRebo->getActiveUsers($pages);
    }

    public function getUnActiveTeachers($pages){

        return $this->teacherRebo->getUnActiveUsers($pages);
    }


    public function updateProfile($data){
    
     return  $this->teacherRebo->update($data);
    }

    public function getTeacher($teacherId){

        return $this->teacherRebo->find($teacherId);
    }

    public function handleUploadProfilePic($uploadedFile , $UsercurrentFile){
         
        if ($uploadedFile  == null){
            
            return null;
        }

          if ($UsercurrentFile != self::$defaultProfilePath) {
               $deletedFile = substr($UsercurrentFile , 8);

               $this->fileservice->DeleteFile($deletedFile);

          }

          $this->fileservice->setFile($uploadedFile);
          $this->fileservice->setPath("teachers");
          return $this->fileservice->uploadFile();
    }

    private function deleteLessonPic($lessonImagePath){
        $deletedFile = substr($lessonImagePath , 8);

        $this->fileservice->DeleteFile($deletedFile);
         
    }

    public function handleUploadLessonPic($uploadedFile , $UsercurrentFile = null){
              
        if ($uploadedFile == null) {
            return null;
        }

        if ($UsercurrentFile != self::$defaultLessonPathPic) {
            $deletedFile = substr($UsercurrentFile , 8);

            $this->fileservice->DeleteFile($deletedFile);
        }

        
        
        $this->fileservice->setFile($uploadedFile);
        $this->fileservice->setPath("lessons");
        return $this->fileservice->uploadFile();

    }

    public function handleUploadcv($uploadedFile , $currentCv){

        $targetCvData = array();
         
    
       
         
        if ($uploadedFile  == null){
            
            return null;
        }
        $targetCvData['name'] = $uploadedFile->getClientOriginalName();
        if ($currentCv != "null") {
            if ($currentCv != null) {
                $this->fileservice->DeleteFile($currentCv->cv);
            }
            
        }

          $this->fileservice->setFile($uploadedFile);
          $this->fileservice->setPath("teachers/cv");
          $targetCvData ['cv'] = $this->fileservice->uploadFile();

          return json_encode($targetCvData);
    }

    public function BookASeat($eventId , $User){
         
        $action = $this->EventRepo->subscribeUser($eventId , $User);

        return $action;

    }

    public function AddLesson($data){

        return $this->teacherRebo->AddLesson($data);
    }

    public function getLessons($teacherId , $pages){

        return $this->teacherRebo->getLessons($teacherId , $pages);
    }

    public function deleteLesson($lessonId){
          
        $lesson = Lesson::findOrFail($lessonId);
        $this->deleteLessonPic($lesson->image);
       return $this->teacherRebo->deleteLesson($lesson);


    }

    public function updateLesson($data , $file){


            
        $lesson = $this->teacherRebo->getLesson($data['id']);

        

        $data['image'] = $this->handleUploadLessonPic($file , $lesson->image);
        return  $this->teacherRebo->updateLesson($lesson , $data);
         
        
    

    }
}