<?php

namespace Shankl\Services;

use Shankl\Repositories\SupplierRepository;

class SupplierService{

    private $supplierRebo;
    private $fileService;

    private static $defaultProfilePath = "assets/images/logo/user.png";


    public function __construct(SupplierRepository $supplierRebo , FileService $fileService)
    {
        $this->supplierRebo = $supplierRebo;
        $this->fileService = $fileService;
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

        $this->supplierRebo->update($data);
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
}