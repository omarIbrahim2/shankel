<?php

namespace Shankl\Repositories;

use App\Models\ServiceImage;
use Shankl\Services\FileService;

class ServiceImagesRepo{
    
    private $fileService;
    public function __construct(FileService $fileService){
        $this->fileService = $fileService;

    }

    public function Delete($ImageId){

        $ServiceImage =  $this->getImage($ImageId);
        
        $deletedImage = substr($ServiceImage->img , 8);

        $this->fileService->DeleteFile($deletedImage);

        $ServiceImage->delete();

    }

    public function getImage($imageId){

       return  ServiceImage::findOrFail($imageId);
    }
      
     public function getImages($service){
         return $service->images;
     }


     public function create($images , $serviceId){
            

           foreach($images as $image){

               $this->fileService->setFile($image);

               $this->fileService->setPath('seviceImages');

             $imagePath =  $this->fileService->uploadFile();

                ServiceImage::insert([ 'image' =>  $imagePath , 'service_id' => $serviceId ]);

           }

           return true;
     }
   


}