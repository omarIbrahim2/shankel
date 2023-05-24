<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory, HasTranslations;
    
      protected $guarded = ['id', 'created_at','updated_at'];

      public $translatable = ['title' , 'info'];
      public function image(): Attribute
      {
  
          return new Attribute(
              get: function($value){
                 return "uploads/".$value;
              }
          );
      }

      public function title($lang = null){
        $lang = $lang ?? App::getLocale();

        return json_decode($this->title)->$lang ;
       }
       
       
       public function info($lang = null){
        $lang = $lang ?? App::getLocale();

        return json_decode($this->info)->$lang ;
       }


      public static function  paginate($items, $perPage , $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
