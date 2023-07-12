<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Shankl\Interfaces\PartnerRepoInterface;
use Shankl\Repositories\GalleryRepository;
use Shankl\Services\AdminService;
use Shankl\Services\SchoolService;

class HomeController extends Controller
{
    private $adminService;
    private $galleryRepo;

    private $partnerRepo;

    private $schoolService;


    public function __construct(AdminService $adminService, GalleryRepository $galleryRepo , PartnerRepoInterface $partnerRepo , SchoolService $schoolService)
    {
        $this->adminService = $adminService;
        $this->galleryRepo = $galleryRepo;
        $this->partnerRepo = $partnerRepo;
        $this->schoolService = $schoolService;
    }
    public function index()
    {
        $Sliders =  $this->adminService->getSliders();
        $gallery = $this->galleryRepo->getImages();
        $Partners = $this->partnerRepo->get(['id' , 'image']);
        $schools = $this->schoolService->getMostViewed();
        return view("web.Home.index")->with([
            'Sliders' => $Sliders,
            'images' => $gallery,
            'Partners' => $Partners,
            'Schools' => $schools,
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
