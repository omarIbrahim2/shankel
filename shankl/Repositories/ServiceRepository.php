<?php
namespace Shankl\Repositories;

use App\Models\Service;
use App\Models\ServiceImage;
use Shankl\Interfaces\ServiceRepoInterface;

class ServiceRepository implements ServiceRepoInterface{


     public function create($data)
     {
         return Service::create($data);
     }


     public function RecentServices(){
       return Service::select('name' , 'price' , 'id' , 'image','quantity')->orderBy('created_at' , 'DESC')->limit(3)->get();

     }


     public function update($data , $service)
     {


       return $service->update($data);

     }

     public function delete($serviceId)
     {
       $service = $this->find($serviceId);

       return $service->delete();

     }

     public function getServices(){

      return  Service::with(['supplier'] , function($query){

        $query->select('name')->first();
       })->orderby('created_at' , 'DESC')->get();

     }


     public function serviceImages($serviceId){

       return Service::select('id')->with(['images:id,service_id,image'])->findOrFail($serviceId);
     }

     public function find($serviceId){

        return  Service::with(['images'])->findOrFail($serviceId);
     }


}