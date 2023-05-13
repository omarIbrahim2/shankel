<?php

namespace Shankl\Interfaces;



interface LocationRepoInterface{
  
    public function getCities();

    public function getArea($cityId);

    public function getAreas();
  

}