<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Shankl\Repositories\GalleryRepository;
use Shankl\Services\AdminService;

class HomeController extends Controller
{
    private $adminService;
    private $galleryRepo;
    public function __construct(AdminService $adminService, GalleryRepository $galleryRepo)
    {
        $this->adminService = $adminService;
        $this->galleryRepo = $galleryRepo;
    }
    public function index()
    {
        $Sliders =  $this->adminService->getSliders();
        $gallery = $this->galleryRepo->getImages();
        return view("web.Home.index")->with([
            'Sliders' => $Sliders,
            'images' => $gallery,
        ]);
    }

    public function selectUserRegister()
    {

        return view('web.Select.selectUserRegister');
    }

    public function selectUserLogin()
    {

        return view('web.Select.selectUserLogin');
    }
}
