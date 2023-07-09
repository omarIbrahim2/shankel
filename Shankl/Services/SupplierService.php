<?php

namespace Shankl\Services;

use Shankl\Repositories\CommentRepo;
use Shankl\Interfaces\ServiceRepoInterface;
use Shankl\Repositories\SupplierRepository;

class SupplierService extends Service{

    private $supplierRebo , $commentRepo , $fileService;
    

    private static $defaultProfilePath = "assets/images/logo/user.png";

    private static $defaultServicImage = "assets/images/services/service.jpg";
    
    private $ServiceRebo;

    public function __construct(SupplierRepository $supplierRebo , FileService $fileService , ServiceRepoInterface $ServiceRebo, CommentRepo $commentRepo)
    {
        $this->supplierRebo = $supplierRebo;
        $this->fileService = $fileService;
        $this->ServiceRebo = $ServiceRebo;
        $this->commentRepo = $commentRepo; 
    }
     
    public function getSupplier($supplierId){

        return $this->supplierRebo->find($supplierId);
    }

    public function getActiveSubbliers($pages){

        return  $this->supplierRebo->getActiveUsers($pages);
    }


    public function getUnActiveSuppliers($pages){

        return $this->supplierRebo->getUnActiveUsers($pages);
    }


    public function updateProfile($data){

        return $this->supplierRebo->update($data);
    }

    public function deleteSupplier($supplierId){

       return $this->supplierRebo->delete($supplierId);
    }


    public function handleUploadProfilepic($uploadedFile , $UsercurrentFile){

        if ($uploadedFile == null) {
            return;
        }

        if ($UsercurrentFile != self::$defaultProfilePath) {
            $deletedFile = substr($UsercurrentFile , 8);

            $this->fileService->DeleteFile($deletedFile);

       }

       $this->fileService->setFile($uploadedFile);
       $this->fileService->setPath("suppliers");
       return $this->fileService->uploadFile();
    }

    public function getServices($supplierId , $pages){

         return $this->supplierRebo->SupplierServices($supplierId , $pages);
    }

    public function createService($data){

        return $this->ServiceRebo->create($data);
    }

    public function updateService($data){

        return $this->ServiceRebo->update($data);
    }

    public function uploadServiceImage($uploadedImage , $currentImage){
        if ($uploadedImage == null) {
            return null;
        }

        if ($currentImage != self::$defaultServicImage) {
            $deletedFile = substr($currentImage , 8);

            $this->fileService->DeleteFile($deletedFile);

       }

       $this->fileService->setFile($uploadedImage);
       $this->fileService->setPath("services");
       return $this->fileService->uploadFile();

    }

    public function DeleteService($serviceId){

        return $this->ServiceRebo->delete($serviceId);
    }

    public function getService($serviceId){

        return $this->ServiceRebo->find($serviceId);
    }


    public function addComment($user , $comment , $supplierId){
   
        return $this->commentRepo->createComment($user , $comment , $supplierId);
    
    }
    
    public function getComments($supplierId){
    
        return $this->commentRepo->getComments($supplierId);
    }
    
    public function updateComment($newComment , $commentId){
    
        return $this->commentRepo->updateComment($newComment , $commentId);
    }


    public function areaSuppliers($pages)
    {
        return $this->supplierRebo->getAreaSuppliers($pages);
    }

    public function areaTeachers($pages)
    {
        return $this->supplierRebo->getAreaTeachers($pages);
    }

    public function areaSchools($pages)
    {
        return $this->supplierRebo->getAreaSchools($pages);
    }

    public function areaCenters($pages)
    {
        return $this->supplierRebo->getAreaCenters($pages);
    }

    public function areaKgs($pages)
    {
        return $this->supplierRebo->getAreaKgs($pages);
    }
}