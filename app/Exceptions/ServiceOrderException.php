<?php

namespace App\Exceptions;

use Exception;

class ServiceOrderException extends Exception
{
    public function render(){

        trans('payment.empty');

        return back();

    }
}
