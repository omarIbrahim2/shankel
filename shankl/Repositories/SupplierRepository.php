<?php
namespace Shankl\Repositories;

use App\Models\School;
use App\Models\Service;
use App\Models\Teacher;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Shankl\Interfaces\UserReboInterface;

class SupplierRepository implements UserReboInterface{


    public function getActiveUsers($pages)
    {
        return Supplier::with(['area:id,name'])->where("status" , true)->orderBy('created_at','DESC')->paginate($pages);
    }

    public function getUnActiveUsers($pages)
    {
        return Supplier::with(['area:id,name'])->where("status" , false)->orderBy('id','DESC')->paginate($pages);
    }
    public function find($userId)
    {
      return Supplier::with(['area.city:id,name' , 'services:id,supplier_id,name,price,image'])->findOrFail($userId);

    }
    
    
      public function findSupplierDashboard($userId){

        return Supplier::with(['area.city:id,name'])->findOrFail($userId);
    }


    public function create($data)
    {
        return Supplier::create($data);
    }
    
  public function update($data)
    {
       $supplier = $this->findSupplierDashboard($data['id']);

       

       return $supplier->update($data);

    }

    public function delete($supplierId){

        $supplier = $this->find($supplierId);

        return $supplier->delete();
    }

    public function SupplierServices($supplierId , $pages){


        $supplier =Supplier::with(["services"=>function($query){
            $query->orderBy("created_at" , "desc")->get();
        }])->findOrFail($supplierId);
          $services = $supplier->services;


          return Service::paginate($services , $pages);

    }


    public function getAreaSuppliers($pages){
        $SupplierUserId =  Auth::guard('supplier')->user()->id;
        $AuthSupplier = Supplier::with('area')->findOrFail($SupplierUserId);
        $areaId = $AuthSupplier->area->id;
        $areaSuppliers = Supplier::select('id','image','name','type','orgName','area_id')->where('area_id' , $areaId)->paginate($pages);
        return $areaSuppliers;
     }

     public function getAreaTeachers($pages){
        $SupplierUserId =  Auth::guard('supplier')->user()->id;
        $AuthSupplier = Supplier::with('area')->findOrFail($SupplierUserId);
        $areaId = $AuthSupplier->area->id;
        $areaTeachers = Teacher::where('status' , true)->where('area_id' , $areaId)->paginate($pages);
        return $areaTeachers;
     }

     public function getAreaSchools($pages){
        $supplierUserId =  Auth::guard('supplier')->user()->id;
        $AuthSupplier = Supplier::with('area')->findOrFail($supplierUserId);
        $areaId = $AuthSupplier->area->id;
        $areaSchools = School::select('id','image','name','area_id')->
        where('type' , 'School')->where('area_id' , $areaId)->paginate($pages);
        return $areaSchools;
     }

     public function getAreaCenters($pages){
        $supplierUserId =  Auth::guard('supplier')->user()->id;
        $AuthSupplier = Supplier::with('area')->findOrFail($supplierUserId);
        $areaId = $AuthSupplier->area->id;
        $areaCenters = School::select('id','image','name','area_id')->
        where('type' , 'Center')->where('area_id' , $areaId)->paginate($pages);
        return $areaCenters;
     }

     public function getAreaKgs($pages){
        $supplierUserId =  Auth::guard('supplier')->user()->id;
        $AuthSupplier = Supplier::with('area')->findOrFail($supplierUserId);
        $areaId = $AuthSupplier->area->id;
        $areaKgs = School::select('id','image','name','area_id')->
        where('type' , 'KG')->where('area_id' , $areaId)->paginate($pages);
        return $areaKgs;
     }

}
