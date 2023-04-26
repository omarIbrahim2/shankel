<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class School extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable , AuthAuthenticatable;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function grades()
    {
        return $this->belongsToMany(Grade::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function eduSystem()
    {
        return $this->belongsTo(EduSystem::class);
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
        return $this->morphMany(Event::class , 'creator');
    }

    public function card()
    {
        return $this->morphOne(Card::class , 'user');
    }

    public function eventSubscriber()
    {
        return $this->morphToMany(Event::class, 'subscriber');
    }

    public function addverts()
    {
        return $this->morphMany(Addvert::class, 'creator');

    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class , 'transactionable');
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

}
