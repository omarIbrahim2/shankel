<?php

use Shankl\Filters\AreaFilter;
use Shankl\Filters\EduFilters;
use Shankl\Filters\GradesFilter;

return [
  
    "area_id" => AreaFilter::class,

    "edu_systems_id" => EduFilters::class,

    "grade_id" => GradesFilter::class,

];