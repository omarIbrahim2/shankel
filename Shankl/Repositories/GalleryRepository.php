<?php

namespace Shankl\Repositories;

use App\Models\Gallery;
use Shankl\Services\FileService;

class GalleryRepository
{

    private $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function getImages($pages = null)
    {

        if ($pages != null) {
            return Gallery::select("id", 'image', 'title')->paginate($pages);
        }
        return Gallery::select("id", 'image', 'title')->get();
    }

    public function createImage($data)
    {

        return Gallery::create($data);
    }

    public function getImage($galleryId)
    {
        return Gallery::findOrFail($galleryId);
    }

    public function updateImage($data, $galleryId)
    {
        $Image = $this->getImage($galleryId);
        return $Image->update($data);
    }

    private function deletePic($image)
    {
        $deletedFile = substr($image, 8);
        $this->fileService->DeleteFile($deletedFile);
    }


    public function deleteImage($galleryId)
    {
        $Image = $this->getImage($galleryId);
        $this->deletePic($Image->image);
        return $Image->delete();
    }
}
