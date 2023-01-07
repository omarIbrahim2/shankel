<?php

namespace Shankl\Adapters;

use Shankl\Interfaces\FileServiceInterface;


class FileServiceAdapter{

     private $fileservice;
     
     private $file;

     private $path;
 
    public function __construct(FileServiceInterface $fileservice)
    {
        $this->fileservice = $fileservice;
    }


    public function upload(){
       
       return $this->fileservice->uploadFile($this->getFile() , $this->getPath());


    }


    public function setFile($file){
      
        $this->fileservice->setFile($file);

    }


    public function setPath($path){

        $this->fileservice->setPath($path);
    }

    public function getFile(){

        return $this->fileservice->getFile();
    }

    public function getPath(){

        return $this->fileservice->getFile();
    }


   
}
