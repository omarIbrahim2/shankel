<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
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
        return $this->belongsTo(Area::class);
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class , 'user');
    }

    public function card()
    {
        return $this->morphOne(Card::class , 'user');
    }

    public function eventSubscriber()
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
}
