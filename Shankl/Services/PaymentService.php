<?php


namespace Shankl\Services;

use Shankl\Adapters\PaymentAdapter;
use Shankl\Helpers\SmkLivePaypal;

class PaymentService{
    
    private $paymentAdapter;
    public function __construct()
    {
        $this->paymentAdapter = new PaymentAdapter(new SmkLivePaypal());
    }


    public function submit(){


        
    }

    




}