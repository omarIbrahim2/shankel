<?php

namespace Shankl\Interfaces;

use Illuminate\Http\Request;

interface PaymentInterface{


        
      public function submitPayment();

      public function successPayment($request);

      public function cancelPayment();

      public function setData($data);


      

}