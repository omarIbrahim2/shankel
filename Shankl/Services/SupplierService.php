<?php

namespace Shankl\Services;

use Shankl\Interfaces\ServiceRepoInterface;
use Shankl\Repositories\SupplierRepository;

class SupplierService{

    private $supplierRebo;
    private $fileService;

    private static $defaultProfilePath = "assets/images/logo/user.png";

    private static $defaultServicImage = "assets/images/services/service.jpg";
    
    private $ServiceRebo;

    public function __construct(SupplierRepository $supplierRebo , FileService $fileService , ServiceRepoInterface $ServiceRebo)
    {
        $this->supplierRebo = $supplierRebo;
        $this->fileService = $fileService;
        $this->ServiceRebo = $ServiceRebo;
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
}