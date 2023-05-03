<?php

namespace Shankl\Services;

use Shankl\Repositories\TeacherRepository;

class TeacherService{

    private $teacherRebo;

    private $fileservice;

    private static $defaultProfilePath = "assets/images/logo/user.png";

    public function __construct(TeacherRepository $teacherRebo , FileService $fileService)
    {
        $this->teacherRebo = $teacherRebo;
        $this->fileservice = $fileService;
    }


    public function updateProfile($data){
    
     return  $this->teacherRebo->update($data);
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
}