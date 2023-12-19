<?php

namespace Shankl\Interfaces;


abstract class AbstractOrder{

    public function generateOrderCode(){
        $str = rand();
       $hashed = md5($str);
       return $hashed;
    }
}
