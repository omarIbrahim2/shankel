<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable{

    public function search($filters  , Builder $query){
           
           
            foreach($filters as $filterKey => $filterVal){
                  
               $filterClass =  config('Filter.' . $filterKey);
                
                $obj = new $filterClass();

                 $query = $obj->handle($filterVal  , $query);
            }


          return $query->get();  

    }
}