<?php

namespace App\Traits;


trait HandleUpload{

  public function handleUpload($request , $fileService , $model = null , $path){
      
       if (! $request->has('image')) {
           
           return;
       }

       if ($model != null) {
            $deletedPath = substr($model->image , 8 );
           $fileService->DeleteFile($deletedPath);
       }


         
       $fileService->setPath($path);
       $fileService->setFile($request['image']);

       return $fileService->uploadFile();

  }

}