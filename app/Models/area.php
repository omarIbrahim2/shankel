<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = ['id' , 'created_at','updated_at'];

    public function parentts()
    {
        return $this->hasMany(Parentt::class);
    }

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function events(){

        return $this->hasMany(Event::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
