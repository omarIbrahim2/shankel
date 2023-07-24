<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Database\Eloquent\Builder;



trait SearchTrait
{


  public function TitleSearch($value, $key, Builder $query)
  {
    return $query->where($key[0], 'LIKE', '%' . $value . '%')
    ->orWhere($key[1] , 'LIKE', '%' . $value . '%')
    ->paginate(10);
  }

  public function NameOrEmailSearch($value, $keys, $active, Builder $query)
  {
    $query->select('name', "image", 'id', 'area_id');
    if ($active == true) {
      $result = $query->where('status', true);
    } else {
      $result = $query->where('status', false);
    }

    $result = $query->where($keys['name_en'], 'LIKE', '%' . $value . '%')
      ->orWhere($keys['name_ar'], 'LIKE', '%' . $value . '%')
      ->orWhere($keys['email'], $value)
      ->paginate(10);

    return $result;
  }
}
