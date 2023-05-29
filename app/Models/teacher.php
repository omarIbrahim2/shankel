<?php

namespace App\Models;

use App\Notifications\TeacherResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Teacher extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function addverts()
    {
        return $this->morphMany(Addvert::class, 'advertable');

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

    public function comments(){

        return $this->morphMany(comment::class, 'commentable');
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class , 'user');
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


        $this->notify(new TeacherResetPasswordNotification($token));
    }
}
