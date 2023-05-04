<?php

namespace Shankl\Helpers;

use Illuminate\Http\Request;
use Shankl\Interfaces\PaymentInterface;

class PaypalPayment implements PaymentInterface{

  public function Payment(Request $request)
  {
      
    

  }

  public function submitPayment(Request $request)
  {
    
  }

  public function cancelPayment(Request $request)
  {
    
  }

}