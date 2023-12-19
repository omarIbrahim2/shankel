<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function areas()
    {
        return $this->hasMany(Area::class );
    }

    public function name($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->name)->$lang ;
    }
}
