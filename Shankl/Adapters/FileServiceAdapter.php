<?php

namespace Shankl\Adapters;

use Shankl\Interfaces\FileServiceInterface;


class FileServiceAdapter{

     private $fileservice;

 
    public function __construct(FileServiceInterface $fileservice)
    {
        $this->fileservice = $fileservice;
    }


    public function upload($file , $path){
       
       return $this->fileservice->uploadFile($file , $path);


    }


   
}
