<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getSupplierAdmin($id){

        return view('admin.suppliers.details')->with(['id' => $id]);
    }
}
