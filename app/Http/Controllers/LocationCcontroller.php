<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Repositories\LocationRepository;
use Symfony\Component\HttpFoundation\Response;

class LocationCcontroller extends Controller
{
       private LocationRepository $locationRepo;

      public function __construct(LocationRepoInterface $locationRepo)
      {
         $this->locationRepo = $locationRepo;
      }

    public function Areas($cityId){
        

        $areas = $this->locationRepo->getArea($cityId);

        return Response()->json([
           
            "areas" => $areas,
        ]);

    }
}
