<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
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