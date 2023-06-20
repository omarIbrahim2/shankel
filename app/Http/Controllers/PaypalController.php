<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\SchoolRegOrder;
use Shankl\Helpers\Paypal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Shankl\Adapters\PaymentAdapter;
use Shankl\Helpers\SeatsBooking;
use Shankl\Helpers\SmkLivePaypal;
use Shankl\Services\SchoolService;

class PaypalController extends Controller
{
    private $paypal;
    private $seatBooking;
  
    public function __construct(SeatsBooking $seatBooking)
    {
        $this->paypal = new PaymentAdapter(new SmkLivePaypal);
        $this->seatBooking = $seatBooking;
    }
    
   


   public function payment(Request $request , SchoolService $schoolService){
       
   
      $vaidatedReq = $request->validate([
         'school_id' => "required|exists:schools,id", 
         'child_id' => 'required|exists:children,id',
         'grade_id' => 'required|exists:grades,id',
       ]);

       $vaidatedReq['parentt_id'] =  Auth::guard("parent")->user()->id;

       try {
        $data = $this->seatBooking->PrepareBooking($vaidatedReq);
       } catch (\App\Exceptions\SeatBookingException $e) {
           
           $e->render();
          return back()->with('error' , trans('payment.wrong'));
       }
   
       $data['amount'] = 20; 
       $data['success'] = url(route('paypal-success' , $request->school_id));
       $data['cancel'] = url(route('paypal-cancel'));
         
        $this->paypal->setData($data);
       return  $this->paypal->submit();
   }


   public function success(Request $request , SchoolService $schoolService){
      $this->seatBooking->handleBooking(); 
      return $this->paypal->success($request);
   }

   public function cancel(){
     return $this->paypal->cancel();
   }

}

 