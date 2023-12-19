<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\TeacherResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;


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

        return $this->morphMany(Comment::class, 'commentable');
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
                   
                 return "assets/images/teachers/6.webp";

                 
               }
        
               return "uploads/".$value;
            }
        );
    }


    public function sendPasswordResetNotification($token){


        $this->notify(new TeacherResetPasswordNotification($token));
    }


    public function name($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->name)->$lang ;
    }

    public function field($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->field)->$lang ;
    }
}