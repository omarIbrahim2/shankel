<?php

namespace Shankl\Repositories;

use App\Models\Area;
use App\Models\City;
use Shankl\Interfaces\LocationRepoInterface;

class LocationRepository implements LocationRepoInterface{

  public function getCities()
  {
     $cities = City::select("id" , "name")->get();

     return $cities;
  }


  public function getArea($cityId)
  {
     
    $city = City::findOrFail($cityId);

    return $city->areas;
     

  }

  public function getAreas()
  {
       return  Area::select('name' , 'id')->get();
  }
    



};