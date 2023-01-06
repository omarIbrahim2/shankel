<?php

namespace Shankl\Services;

use Illuminate\Support\Facades\Storage;
use Shankl\Interfaces\FileServiceInterface;

class FileService implements FileServiceInterface{
   
    public function uploadFile($file , $path)
    {
        $res = $file->store($path);

        return $res;
    }


    public function DeleteFile($file){
         Storage::delete($file);
    }


}