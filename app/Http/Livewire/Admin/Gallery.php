<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Repositories\GalleryRepository;


class Gallery extends Component
{
    use WithPagination;
    public function render(GalleryRepository $galleryRepo)
    {
        $images = $galleryRepo->getImages(10);
        return view('livewire.admin.gallery')->with([
            'galleries' => $images,
        ]);
    }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
