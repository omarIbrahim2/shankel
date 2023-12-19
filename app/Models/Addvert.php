<?php

namespace App\Models;

use App\Http\Middleware\School;
use App\Http\Middleware\Teacher;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Addvert extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function addvertable()
    {
        return $this->morphTo();
    }

 
    
    public function image(): Attribute
    {

        return new Attribute(
            get: function($value){
               return "uploads/".$value;
            }
        );
    }


    public static function  paginate($items, $perPage , $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    

    public function title($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->title)->$lang ;
    }
    
    public function desc($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->desc)->$lang ;
    }
}
