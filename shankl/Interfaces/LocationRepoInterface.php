<?php

namespace Shankl\Interfaces;



interface LocationRepoInterface{
  
    public function getCities();
    public function cities();
    public function getArea($cityId);
    public function cityAreas($cityId);
    public function getAreas();
  

}