<?php

namespace Shankl\Filters;

use Illuminate\Database\Eloquent\Builder;
use Shankl\Interfaces\Filter;

class AreaFilter implements Filter{
    

    public function handle($value, Builder $query)
    {
         return $query->where("area_id" , $value)
         ->where("status" , true);
         
    }
}