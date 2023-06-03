<?php

namespace Shankl\Interfaces;


interface CardInterface{


    public function addToCard($User , $serviceId);


    public function getCardWithServices();
}