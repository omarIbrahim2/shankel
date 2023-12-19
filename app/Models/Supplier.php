<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\SupplierResetPasswordNotification;

class Supplier extends  Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function addverts()
    {
        return $this->morphMany(Addvert::class, 'advertable');

    }

    public function notifications()
    {
        return $this->morphMany(Notification::class , 'user');
    }

    public function eventSubscribers()
    {
        return $this->morphToMany(Event::class, 'eventable');
    }

    public function comments(){

        return $this->morphMany(Comment::class, 'commentable');
    }


    public function image(): Attribute
    {

        return new Attribute(
            get: function($value){
        
               if ($value == null) {
                   
                 return "assets/images/partners/4.png";

                 
               }
        
               return "uploads/".$value;
            }
        );
    }


    public function sendPasswordResetNotification($token){
          
        $this->notify(new SupplierResetPasswordNotification($token));

    }

    public function name($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->name)->$lang ;
    }

    public function type($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->type)->$lang ;
    }

    public function orgName($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->orgName)->$lang ;
    }

}