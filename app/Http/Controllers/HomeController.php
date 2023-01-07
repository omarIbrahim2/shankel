<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    public function index(){

        return view("web.Home.index");
    }

    public function selectUserRegister(){

        return view('web.Select.selectUserRegister');
    }

    public function selectUserLogin(){

        return view('web.Select.selectUserLogin');
    }
}
