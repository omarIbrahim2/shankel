<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at','updated_at'];

    public function eventable()
    {
        return $this->morphTo();
    }
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function Parentts()
    {
        return $this->morphedByMany(Parentt::class, 'eventable');
    }

    public function schools()
    {
        return $this->morphedByMany(School::class, 'eventable');
    }

    public function teacher()
    {
        return $this->morphedByMany(Teacher::class, 'eventable');
    }

    public function suppliers()
    {
        return $this->morphedByMany(Supplier::class, 'eventable');
    }

    public function startAt(){

        return Carbon::createFromFormat('H:i:s' , $this->attributes['start_at'])->format('g:i A');
    }

    public function endAt(){

        return Carbon::createFromFormat('H:i:s' , $this->attributes['end_at'])->format('g:i A');
    }

    public function formatedDate($attribute){

        return Carbon::createFromFormat('Y-m-d' , $attribute)->format("d F Y");

    }

    public function diffD(){

         $endat = Carbon::createFromFormat('Y-m-d H:i:s' , $this->attributes['end_at']);
          $startat = Carbon::createFromFormat('Y-m-d H:i:s' , $this->attributes['start_at']);

          return $endat->diffInDays($startat);

    }

}
