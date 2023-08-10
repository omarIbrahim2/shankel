<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\EduSystem;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Support\Authorization\AuthorizationUserTrait;
use App\Notifications\SchoolResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;

class School extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable , AuthAuthenticatable;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function grades()
    {
        return $this->belongsToMany(Grade::class);
    }

    public function parentts(){

        return $this->belongsToMany(Parentt::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function bookOrders(){

        return $this->hasMany(SchoolRegOrder::class);
    }

    public function eduSystem()
    {
        return $this->belongsTo(EduSystem::class , 'edu_systems_id');
    }

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class , 'user');
    }

    public function events()
    {
        return $this->morphMany(Event::class , 'eventable');
    }

    public function card()
    {
        return $this->morphOne(Card::class , 'user');
    }

    public function eventSubscribers()
    {
        return $this->morphToMany(Event::class, 'eventable');
    }

    public function addverts()
    {
        return $this->morphMany(Addvert::class, 'advertable');

    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class , 'user');
    }

    public function comments(){

        return $this->morphMany(Comment::class, 'commentable');
    }


    public function image(): Attribute
    {

        return new Attribute(
            get: function($value){
        
               if ($value == null) {
                   
                 return "assets/images/school/2.webp";

                 
               }
        
               return "uploads/".$value;
            }
        );
    }
    public function sendPasswordResetNotification($token){
          
        $this->notify(new SchoolResetPasswordNotification($token));

    }


    public function name($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->name)->$lang ;
    }

    public function desc($lang = null){
        $lang = $lang ?? App::getLocale();
        return $this->attributes['desc']  == null ? '' : json_decode($this->desc)->$lang ; ;
    }

    public function mission($lang = null){
        $lang = $lang ?? App::getLocale();
      return  $this->attributes['mission']  == null ? '' : json_decode($this->mission)->$lang ;
    }

    public function vision($lang = null){
        $lang = $lang ?? App::getLocale();
        return  $this->attributes['vision']   == null ? '' : json_decode($this->vision)->$lang ; ;
    }
}