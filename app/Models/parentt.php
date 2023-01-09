<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Parentt extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at','updated_at'];


    public function children()
    {
        return $this->hasMany(Child::class);
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
        return $this->morphToMany(Event::class, 'subscriber');
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class , 'user');
    }


    public function sendPasswordResetNotification($token){
          
        $this->notify(new ResetPasswordNotification($token));

    }
}
