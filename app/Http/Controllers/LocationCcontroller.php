<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use Shankl\Services\FileService;
use App\Http\Requests\areaAddRequest;
use App\Http\Requests\CityAddRequest;
use App\Http\Requests\areaupdateRequest;
use App\Http\Requests\CityupdateRequest;
use Shankl\Repositories\LocationRepository;
use Shankl\Interfaces\LocationRepoInterface;
use Symfony\Component\HttpFoundation\Response;

class LocationCcontroller extends Controller
{
    private LocationRepository $locationRepo;

    public function __construct(LocationRepoInterface $locationRepo)
    {
        $this->locationRepo = $locationRepo;
    }

    public function index()
    {
        return view('admin.locations.cities');
    }

    public function createCity()
    {
        return view('admin.locations.createCity');
    }

    public function updateCity($cityId)
    {

        $City = City::findOrFail($cityId);

        if ($City) {
            return view('admin.locations.updateCity')->with(['City' => $City]);
        }

        return back();
    }

    public function storeCity(CityAddRequest $request)
    {

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);


        $City = City::create($data);


        if ($City) {
            toastr('City created successfully', 'success', 'create City');
            return redirect()->route('cities');
        }


        toastr('error in  creating', 'error');
    }


    public function editCity(CityupdateRequest $request)
    {

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);


        $City = City::findOrFail($data['id']);

        $action = $City->update($data);


        if ($action) {
            toastr('City Updated successfully', 'success', 'update City');

            return redirect()->route('cities');
        }


        toastr('error in updating', 'error');
    }

    public function deleteCity($cityId)
    {

        $City = City::findOrFail($cityId);

           try {
            $action = $City->delete();

            toastr("City deleted successfully", 'success', "delete City");

            return back();


           } catch (\Throwable $th) {
            toastr("error in deleting You must delete areas first", 'error');

            return back();
           }
          

         
        
    }


    public function showCityAreas($cityId){
      
    
        return view('admin.locations.areas')->with([
            'CityId' => $cityId,
         ]);
    }

    public function createArea($cityId)
    {
        $city = City::findOrFail($cityId);
        return view('admin.locations.createArea')->with(['City' => $city]);
    }

    public function updateArea($areaId)
    {

        $Area = Area::findOrFail($areaId);

        if ($Area) {
            return view('admin.locations.updateArea')->with(['Area' => $Area , 'City' => $Area->city]);
        }

        return back();
    }

    public function storeArea(areaAddRequest $request)
    {

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);
        

        $Area = Area::create($data);


        if ($Area) {
            toastr('Area created successfully', 'success', 'create Area');
            return redirect()->route('city-show-areas' , $Area->city->id);
        }


        toastr('error in  creating', 'error');
    }

    public function editArea(areaupdateRequest $request)
    {

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);


        $Area = Area::findOrFail($data['id']);

        $action = $Area->update($data);


        if ($action) {
            toastr('Area Updated successfully', 'success', 'update Area');

            return redirect()->route('city-show-areas' , $Area->city->id);
        }


        toastr('error in updating', 'error');
    }

    public function deleteArea($areaId)
    {

        $Area = Area::findOrFail($areaId);

            try {
                $action = $Area->delete();
                toastr("Area deleted successfully", 'success', "delete Area");

                return back();
            } catch (\Throwable $th) {
                toastr("error in deleting this area related to another data", 'error');

                return back();
            }
        
         

               
           
         
    }

    public function Areas($cityId)
    {
        $areas = $this->locationRepo->getArea($cityId);
        return Response()->json([
            "areas" => $areas,
        ]);
    }


    private function evaluateData($request)
    {
        $data = array();
        if (array_key_exists('id', $request)) {

            $data['id'] = $request['id'];
        }

        if (array_key_exists('city_id', $request)) {
            $data['city_id'] = $request['city_id'];
        }
        $data['name'] = json_encode([
            'en' => $request['name_en'],
            'ar' => $request['name_ar'],
        ]);
        return $data;
    }
}
