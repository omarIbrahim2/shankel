<?php

namespace Shankl\Interfaces;

use Illuminate\Http\Request;

interface PaymentInterface{

      public function Payment(Request $request);

      public function submitPayment(Request $request);

      public function cancelPayment(Request $request);


      

}