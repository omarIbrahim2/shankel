<?php

namespace Shankl\Repositories;

use App\Http\Requests\SchoolRegisterReq;
use App\Models\SchoolRegOrder;

class SchoolRegOrdersRepo{

    

     public function getAll($pages){

       return  SchoolRegOrder::with(['school' , 'parentt'])->paginate($pages);

        
     }

     public function findById($orderId , $pages){
          
      return SchoolRegOrder::where('id' , $orderId)->paginate($pages);

     }



}