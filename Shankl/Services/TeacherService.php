<?php

namespace Shankl\Services;

use App\Models\Teacher;
use Shankl\Repositories\TeacherRepository;

class TeacherService extends Service{

    private $teacherRebo;

    private $fileservice;

    private static $defaultProfilePath = "assets/images/logo/user.png";

    public function __construct(TeacherRepository $teacherRebo , FileService $fileService)
    {
        $this->teacherRebo = $teacherRebo;
        $this->fileservice = $fileService;
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

    public function handleUploadcv($uploadedFile){
         
        if ($uploadedFile  == null){
            
            return null;
        }

          $this->fileservice->setFile($uploadedFile);
          $this->fileservice->setPath("teachers/cv");
          return $this->fileservice->uploadFile();
    }
}