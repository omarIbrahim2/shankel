<?php

namespace Shankl\Repositories;

use App\Http\Requests\SchoolRegisterReq;
use App\Models\SchoolRegOrder;
use Shankl\Interfaces\OrderRepoInterface;

class SchoolRegOrdersRepo implements OrderRepoInterface{

    

     public function getAll($pages){

       return  SchoolRegOrder::with(['school:id,name' , 'parentt:id,name'])->paginate($pages);

        
     }

     public function findById($orderId , $pages){
          
      return SchoolRegOrder::where('id' , $orderId)->paginate($pages);

     }

     function create($data){
      return SchoolRegOrder::create($data);
     }

     
     function update($data ){

       $order = SchoolRegOrder::findOrFail($data['id']);
        return $order->update($data);
     }

     public function singleOrder($orderId){
         
       return SchoolRegOrder::with(['school.area:id,name' , 'parentt.area:id,name'])->findOrFail($orderId);

     }





}