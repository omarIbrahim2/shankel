<?php
namespace Shankl\Repositories;

use App\Models\Gallery;

class GalleryRepository{

    public function getImages($pages=null){

        if ($pages != null) {
            return Gallery::select("id" , 'image' , 'title')->paginate($pages);
        }
        return Gallery::select("id" , 'image' , 'title' )->get();
    }

    public function createImage($data){

        return Gallery::create($data);
    }

    public function getImage($galleryId)
    {
        return Gallery::findOrFail($galleryId);
    }

    public function updateImage($data , $galleryId)
    {
        $Image =$this->getImage($galleryId);
        return $Image->update($data);
    }

    public function deleteImage($galleryId)
    {
        $Image =$this->getImage($galleryId);
        return $Image->delete();
    }
}