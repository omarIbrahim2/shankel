<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function payment(Request $request){

        dd($request->all());
    }
}
