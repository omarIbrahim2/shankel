<?php

namespace App\Http\Controllers;
use Shankl\Adapters\PaymentAdapter;
use Shankl\Helpers\SmkLivePaypal;

use Illuminate\Http\Request;
use Shankl\Repositories\SchoolRegOrdersRepo;

class TransactionController extends Controller
{
    private $AuthUser;
    private $paypal;

    private $orderRepo;
    public function __construct(SchoolRegOrdersRepo $orderRepo){
        $this->paypal = new PaymentAdapter(new SmkLivePaypal);
        $this->orderRepo = $orderRepo;
    }
    public function payment(Request $request){


    }



    public function singleOrder($orderId){

        $order = $this->orderRepo->singleOrder($orderId);

       return view('invoices.SchoolBooking')->with(['order' => $order , 'school' => $order->school , 'parent'=> $order->parentt  ]);
    }
}
