<?php

namespace Shankl\Filters;

use Illuminate\Database\Eloquent\Builder;
use Shankl\Interfaces\Filter;


class EduFilters implements Filter{


    public function handle($value, Builder $query)
    {
        return $query->where("edu_systems_id" , $value)
         ->where("status" , true);

    }
}