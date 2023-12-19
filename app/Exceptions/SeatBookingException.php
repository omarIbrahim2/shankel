<?php

namespace App\Exceptions;

use Exception;

class SeatBookingException extends Exception
{
    public function render(){

        return trans('payment.wrong');
    }
}
