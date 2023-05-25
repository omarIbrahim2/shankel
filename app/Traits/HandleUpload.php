<?php

namespace App\Traits;


trait HandleUpload{

  public function handleUpload($request , $fileService , $model = null){
      
       if (! $request->has('image')) {
           
           return;
       }

       if ($model != null) {
           
           $fileService->DeleteFile($model->image);
       }


         
       $fileService->setPath('info');
       $fileService->setFile($request['image']);

       return $fileService->uploadFile();

  }

}