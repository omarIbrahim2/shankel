<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Notifications\ParentResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;

class Parentt extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,AuthAuthenticatable ;

    protected $guarded = ['id', 'created_at','updated_at'];


    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function schools(){

        return $this->belongsToMany(School::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class , 'area_id');
    }

    public function bookOrders(){

        return $this->hasMany(SchoolRegOrder::class);
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class , 'user');
    }

    public function card()
    {
        return $this->morphOne(Card::class , 'user');
    }

    public function eventSubscribers()
    {
        return $this->morphToMany(Event::class, 'eventable');
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class , 'user');
    }


    public function sendPasswordResetNotification($token){
          
        $this->notify(new ParentResetPasswordNotification($token));

    }

    public function comments(){

        return $this->morphMany(comment::class, 'commentable');
    }

    public function image(): Attribute
    {

        return new Attribute(
            get: function($value){
        
               if ($value == null) {
                   
                 return "assets/images/user/Ellipse.webp";

                 
               }
        
               return "uploads/".$value;
            }
        );
    }

    public function name() {
        return $this->attributes['name'];
    }
}