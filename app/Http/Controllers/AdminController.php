<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLogin(){

        return view("web.Auth.Admin.adminLogin");
    }


    public function dashboard(){

        return view("admin.index");
    }
}
