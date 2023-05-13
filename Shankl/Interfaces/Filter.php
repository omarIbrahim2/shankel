<?php

namespace Shankl\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface Filter{


   public function handle($value , Builder $query);


}