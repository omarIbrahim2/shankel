<?php

namespace Shankl\Adapters;

use Shankl\Interfaces\PaymentInterface;

class PaymentAdapter{
       
     private $paymentInterface;
     public function __construct(PaymentInterface $paymentInterface)
     {
        $this->paymentInterface = $paymentInterface;
     }

     public function setdata($data){
         
       $this->paymentInterface->setData($data);

     }
     public function submit(){

     return $this->paymentInterface->submitPayment();

     }


     public function success($request){

          return $this->paymentInterface->successPayment($request);
     }


     public function cancel(){
        
       return $this->paymentInterface->cancelPayment();


     }


     

}