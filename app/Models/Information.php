<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $guarded = ['id' , 'created_at' , 'updated_at'];

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

     public function mission($lang = null){

        $lang = $lang ?? App::getLocale();

        return json_decode($this->mission)->$lang ;
     }

     public function vision($lang = null){

        $lang = $lang ?? App::getLocale();

        return json_decode($this->vision)->$lang ;
     }

     public function aboutUs($lang = null){
        $lang = $lang ?? App::getLocale();

        return json_decode($this->aboutUs)->$lang ;

     }

     public function choose($lang = null){
        $lang = $lang ?? App::getLocale();

        return json_decode($this->choose)->$lang ;
     }
}
