<?php
namespace Shankl\Repositories;

use App\Models\Service;
use Shankl\Interfaces\ServiceRepoInterface;

class ServiceRepository implements ServiceRepoInterface{

  
     public function create($data)
     {
         return Service::create($data);
     }


     public function RecentServices(){
       return Service::select('name' , 'price' , 'id' , 'image')->orderBy('created_at' , 'DESC')->limit(3)->get();

     }


     public function update($data)
     {
       $service = $this->find($data['id']);
         
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
       })->get();

     }

     public function find($serviceId){

        return  Service::findOrFail($serviceId);
     }
   

}