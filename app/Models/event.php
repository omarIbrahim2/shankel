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
        return $this->morphedByMany(Teacher::class, 'subscriber');
    }

    public function suppliers()
    {
        return $this->morphedByMany(Supplier::class, 'subscriber');
    }

    public function startAt(){

        return Carbon::createFromFormat('Y-m-d H:i:s' , $this->attributes['start_at'])->format('H:i A');
    }

    public function endAt(){

        return Carbon::createFromFormat('Y-m-d H:i:s' , $this->attributes['end_at'])->format('H:i A');
    }

    public function formatedDate($attribute){

        return Carbon::createFromFormat('Y-m-d H:i:s' , $attribute)->format("d F Y");

    }

}
