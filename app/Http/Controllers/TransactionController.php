<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Social;


use Illuminate\Http\Request;
use Shankl\Repositories\SchoolRegOrdersRepo;
use Shankl\Repositories\ServiceOrderRepo;

class TransactionController extends Controller
{
    

    private $orderRepo;

    private $serviceOrder;
    public function __construct(SchoolRegOrdersRepo $orderRepo  , ServiceOrderRepo $serviceOrder){
        $this->orderRepo = $orderRepo;
        $this->serviceOrder = $serviceOrder;
    }
   



    public function singleBookingOrder($orderId){

        $order = $this->orderRepo->singleOrder($orderId);

        $child = Child::select('name')->findOrFail($order->child_id);

        $Shankel =  Social::select('email' , 'phone' , 'address')->first();

     

       return view("admin.Invoices.SchoolBooking")->with(['order' => $order ,'Child'=> $child ,'school' => $order , 'parent'=> $order , 'Shankel' => $Shankel]);
    }


    public function singleServiceOrder($orderId){

          $Order = $this->serviceOrder->transactionService($orderId);

          $Shankel =  Social::select('email' , 'phone' , 'address')->first();

        
          return view('admin.Invoices.ServiceOrder')->with(['order' => $Order , 'Shankel' => $Shankel]);


    }
}
