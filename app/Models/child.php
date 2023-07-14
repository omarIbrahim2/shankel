<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory;
    protected $guarded = ['id' , 'created_at','updated_at'];

    public function parentt()
    {
        return $this->belongsTo(Parentt::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function image() : Attribute
    {
       return new Attribute(
         get: function($value){
           
            if ($value == null) {
                if ($this->attributes['gender'] == 'male') {
                  return "assets/images/charcters/shankal.png";
                }

                if ($this->attributes['gender'] == 'female') {
                    return "assets/images/charcters/shankola.png";
                }
            }

            return "uploads/". $value;
            

         }
       );
    }

    public function name() {
        return $this->attributes['name'];
    }
}
