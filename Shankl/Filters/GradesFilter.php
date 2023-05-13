<?php

namespace Shankl\Filters;

use Illuminate\Database\Eloquent\Builder;
use Shankl\Interfaces\Filter;


class GradesFilter implements Filter{


    public function handle($value, Builder $query)
    {
        return $query->whereRelation("grades" , 'grade_id' , $value)
         ->where("status" , true);
        
    }
}