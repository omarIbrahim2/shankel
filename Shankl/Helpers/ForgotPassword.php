<?php

namespace Shankl\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPassword{
     
      public function sendResetLinkEmail(Request $request , $broker){
          $this->ValidateRequest($request);

          $response = $this->getBroker($broker)->sendResetLink($this->credentials($request));

          // return $response == Password::RESET_LINK_SENT
          // ?$this->sendResetLinkResponse($request , $response)
          // :$this->sendResetLinkFailedResponse($request , $response);

           return $response;
      }


      public function getBroker($broker){

         return Password::broker($broker);

       }



       public function ValidateRequest(Request $request){

          $request->validate(['email' => 'required|email']);
        }



      public function credentials(Request $request)
      {
        return $request->only('email');
      }


}
