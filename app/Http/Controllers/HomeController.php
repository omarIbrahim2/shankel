<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Shankl\Services\AdminService;

class HomeController extends Controller
{
    private $adminService;
    public function __construct(AdminService $adminService)
    {
       $this->adminService = $adminService;
        
    }
    public function index(){
          
       $Sliders =  $this->adminService->getSliders();
       $Infos = Information::select( 'image' , 'mission' , 'vision' , 'title' , 'aboutUs' , 'choose')->first();

        return view("web.Home.index")->with(['Sliders' => $Sliders , 'Infos' => $Infos]);
    }

    public function selectUserRegister(){

        return view('web.Select.selectUserRegister');
    }

    public function selectUserLogin(){

        return view('web.Select.selectUserLogin');
    }
}
