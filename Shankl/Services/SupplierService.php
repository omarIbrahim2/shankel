<?php

namespace Shankl\Services;

use App\Models\Supplier;
use Shankl\Factories\AuthUserFactory;
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

    private function deleteSupplierPic($SupplierImagePath){
        $deletedFile = substr($SupplierImagePath , 8);

        $this->fileService->DeleteFile($deletedFile);
         
    }

    public function deleteSupplier($supplierId){
        $supplier = Supplier::findOrFail($supplierId);
        $this->deleteSupplierPic($supplier->image);
       return $this->supplierRebo->delete($supplierId);
    }

    public function getServiceDefaultImage(){

        return self::$defaultServicImage;
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

    public function deleteImage($image){

        if ($image != self::$defaultServicImage) {
            $deletedFile = substr($image , 8);
            $this->fileService->DeleteFile($deletedFile);
        }
    }

    public function getServices($supplierId , $pages){

         return $this->supplierRebo->SupplierServices($supplierId , $pages);
    }

    public function createService($data , $file){
          
        $data['image'] = $this->uploadServiceImage($file , null);
        
         $this->ServiceRebo->create($data);
          if (AuthUserFactory::geGuard() == 'web') {
               
            toastr("service created successfully", "success");

            return redirect()->route("Services", $data['supplier_id']);
          }
          
          toastr("service created successfully", "success");

          return redirect()->route("supplier-services");

    }

    public function updateService($data , $file){
             
        $service = $this->ServiceRebo->find($data['id']);

       $data['image'] = $this->uploadServiceImage($file , $service->image);

         $this->ServiceRebo->update($data , $service);

         if (AuthUserFactory::geGuard() == 'web') {
              
            toastr("service updated successfully", "info", "Service update");

            return redirect()->route('dashboard');
         }

         toastr("service updated successfully", "info", "Service update");

         return redirect()->route('supplier-services');
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
          $service = $this->getService($serviceId);

           $this->deleteImage($service->image);
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