<?php


namespace Shankl\Services;

use Shankl\Interfaces\PaymentInterface;

class PaymentService{
    
    private $paymentGateway;
    public function __construct(PaymentInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    
    public function submitPayment($data){
        
        

    }



}