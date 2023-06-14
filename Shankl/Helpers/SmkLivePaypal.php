<?php

namespace Shankl\Helpers;

use Shankl\Interfaces\PaymentInterface;

 
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Srmklive\PayPal\Services\ExpressCheckout;

class SmkLivePaypal implements PaymentInterface{
    
    private $data;

    
   
  public function setData($data){

     $this->data = $data;
  }

    public function submitPayment()
    {
        

        $provder =  new PayPalClient;

        $provder->setApiCredentials(config('paypal'));

        $payPalToken = $provder->getAccessToken();
       
        $response = $provder->createOrder([
              "intent" => "CAPTURE",
              "application_context" => [
                "return_url" => $this->data["success"],
                "cancel_url" => $this->data['cancel'],
              ],

              "purchase_units" => [
                0=>[
                    "amount" => [
                        'child Name' => $this->data['child_name'],
                        'school' => $this->data['school_name'],
                        "currency_code" => "USD",
                        "value" => 20,
                    ],
                ],
            ],
        ]);

        if (isset($response['id'] )  && $response['id'] != null) {
               
            foreach($response['links'] as $links){
                  
                if($links['rel'] == 'approve'){
                    return redirect()->away($links['href']);
                }
            }

            return redirect()->route("register-form-school")->with(['error' => "something wrong happened"]);
        }else{


            return redirect()->route("register-form-school")->with(['error' => $response['message'] ?? "something wrong happened"]);
        }

        
    }


    public function successPayment($request)
    {
       
        $provder =  new PayPalClient;

        $provder->setApiCredentials(config('paypal'));

        $payPalToken = $provder->getAccessToken();

        $response = $provder->capturePaymentOrder($request['token']);

        if (isset($response["status"]) && $response["status"] == "COMPLETED") {
            return redirect()->route("parent")->with(['success' => "You have booked successfully"]);
        }else{
               
            return redirect()->route("parent")->with(['error' => $response['message'] ?? "something wrong happened"]);

        }
    }

    public function cancelPayment()
    {
        return redirect()->route("parent")->with(['error' => $response['message'] ?? "cancelled"]);   
    }
}