<?php
namespace Shankl\Repositories;

use App\Models\Service;
use App\Models\Supplier;
use Shankl\Interfaces\UserReboInterface;

class SupplierRepository implements UserReboInterface{


    public function getActiveUsers($pages)
    {
        return Supplier::where("status" , true)->paginate($pages);
    }

    public function getUnActiveUsers($pages)
    {
        return Supplier::where("status" , false)->paginate($pages);
    }
    public function find($userId)
    {
        return Supplier::findOrFail($userId);
    }


    public function create($data)
    {
        return Supplier::create($data);
    }

    public function update($data)
    {
       $supplier = $this->find($data['id']);

       return $supplier->update($data);

    }

    public function delete($supplierId){

        $supplier = $this->find($supplierId);

        return $supplier->delete();
    }

    public function SupplierServices($supplierId , $pages){

      
        $services =Supplier::with("services")->findOrFail($supplierId)->services;
          
          return Service::paginate($services , $pages);

    }

}