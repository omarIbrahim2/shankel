<?php

namespace Shankl\Adapters;

use Shankl\Interfaces\PaymentInterface;

class PaymentAdapter{
       
     private $paymentInterface;
     public function __construct(PaymentInterface $paymentInterface)
     {
        $this->paymentInterface = $paymentInterface;
     }


     

}