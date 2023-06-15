<?php

namespace Shankl\Interfaces;


interface CardInterface{


    public function addToCard($User , $serviceId , $quantity);


    public function getCardWithServices();

    public function RemoveFromCard($user,$serviceId);

    
}