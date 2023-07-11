<?php

namespace App\Models;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = ['id' , 'created_at' , 'updated_at'];



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
}