<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\SupplierResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supplier extends Authenticatable
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

    public function eventSubscriber()
    {
        return $this->morphToMany(Event::class, 'eventable');
    }


    public function image(): Attribute
    {

        return new Attribute(
            get: function($value){
        
               if ($value == null) {
                   
                 return "assets/images/logo/user.png";

                 
               }
        
               return "uploads/".$value;
            }
        );
    }


    public function sendPasswordResetNotification($token){
          
        $this->notify(new SupplierResetPasswordNotification($token));

    }

}