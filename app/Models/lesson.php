<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at','updated_at'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function children()
    {
        return $this->belongsToMany(Child::class);
    }

    public function url():Attribute{

        return new Attribute(
            set: function($value){
                 
                if (strpos($value , "embed/") != false) {
                     
                    return $value;

                }else{

                    return str_replace("watch?v=" , "embed/" , $value );
                }
                 
            }
        );
    }

    public function image(): Attribute
    {

        return new Attribute(
            get: function($value){
        
               if ($value == null) {
                   
                 return "assets/images/teachers/5.webp";

                 
               }
        
               return "uploads/".$value;
            }
        );
    }
}
