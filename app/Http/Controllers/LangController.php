<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function set($lang , Request $request){
       
        $acceptedLangs = ["en" , "ar"];

        if(! in_array($lang , $acceptedLangs)){

            $request->session()->put("lang" , "en");
        }else{
           
             $request->session()->put("lang" , $lang);

        }

        return back();



    }
}
