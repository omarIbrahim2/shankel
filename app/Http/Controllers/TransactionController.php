<?php

namespace App\Http\Controllers;
use Shankl\Adapters\PaymentAdapter;
use Shankl\Helpers\SmkLivePaypal;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $AuthUser;
    private $paypal;
    public function __construct(){
        $this->paypal = new PaymentAdapter(new SmkLivePaypal);
    }
    public function payment(Request $request){


    }
}
