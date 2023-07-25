<?php

namespace Shankl\Helpers;

use Shankl\Factories\AuthUserFactory;
use Shankl\Interfaces\PaymentInterface;

use Srmklive\PayPal\Services\PayPal as PayPalClient;



class SmkLivePaypal implements PaymentInterface{

    private $data;



  public function setData($data){

     $this->data = $data;
  }

    public function submitPayment()
    {


        $provider =  new PayPalClient;



        $provider->setApiCredentials(config('paypal'));


         $provider->getAccessToken();



        $response = $provider->createOrder([
              "intent" => "CAPTURE",
              "application_context" => [
                "return_url" => $this->data["success"],
                "cancel_url" => $this->data['cancel'],
              ],

              "purchase_units" => [
                0=>[
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $this->data['price'],
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
            toastr(trans('payment.error') , 'error');
            return redirect()->route("home");
        }else{
            
            toastr(trans('payment.error') , 'error');
            return redirect()->route("home");
        }


    }


    public function successPayment($request)
    {
       
        $guard = AuthUserFactory::geGuard();
        $provider =  new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $payPalToken = $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response["status"]) && $response["status"] == "COMPLETED") {
            return redirect()->route($guard)->with(['success' => "You have booked successfully"]);
        }else{
              
            toastr(trans('payment.error') , 'error');
            return redirect()->route($guard);

        }
    }

    public function cancelPayment()
    {
        return redirect()->route("home")->with(['error' => "cancelled"]);
    }
}
