<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Shankl\Adapters\PaymentAdapter;
use Shankl\Helpers\ServiceOrder;
use Shankl\Helpers\SmkLivePaypal;

class ServiceOrderController extends Controller
{
    private $paypal, $serviceOrder;

    public function __construct(ServiceOrder $serviceOrder)
    {
        $this->paypal = new PaymentAdapter(new SmkLivePaypal);
        $this->serviceOrder = $serviceOrder;
    }
    public function payment()
    {
        $data = array();
        $data['success'] = url(route('paypal-service-success'));
        $data['cancel'] = url(route('paypal-service-cancel'));
        $data['amount'] = $this->serviceOrder->getTotalPrice();
        
        $this->paypal->setdata($data);
        $this->serviceOrder->prepareOrder();

        return $this->paypal->submit();
    }

    public function success(Request $request)
    {
        try {
            $this->serviceOrder->handleOrder();
            return $this->paypal->success($request);
        } catch (\Throwable $th) {
            toastr(trans('payment.error') , 'error');
            Log::error($th->getMessage());
            return redirect()->route('home');
        }
     
    }

    public function cancel()
    {
        return $this->paypal->cancel();
    }

    public function OrdersServ(){
        return view("admin.orders.ServiceOrders");
    }

    public function orderDetails($transactionId){
        return view("admin.orders.ordersDetails")->with(['transactionId' => $transactionId]);
    }
}
