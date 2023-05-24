<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory, HasTranslations;
    
      protected $guarded = ['id', 'created_at','updated_at'];


      public function image(): Attribute
      {
  
          return new Attribute(
              get: function($value){
                 return "uploads/".$value;
              }
          );
      }
}
