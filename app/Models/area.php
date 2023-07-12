<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;
    protected $guarded = ['id' , 'created_at','updated_at'];

    public function parentts()
    {
        return $this->hasMany(Parentt::class);
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

    public function name($lang = null){
        $lang = $lang ?? App::getLocale();

        return json_decode($this->name)->$lang ;
    }
}
