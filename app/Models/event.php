<?php

namespace App\Models;

use Carbon\Carbon;



use App\Models\Parentt;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function ParenttsinEvent()
    {
        return $this->morphedByMany(Parentt::class, 'eventable');
    }

    public function schoolsinEvent()
    {
        return $this->morphedByMany(School::class, 'eventable');
    }

    public function teachersinEvent()
    {
        return $this->morphedByMany(Teacher::class, 'eventable');
    }

  

    public function startAt(){

        return Carbon::createFromFormat('H:i:s' , $this->attributes['start_time'])->format('g:i A');
    }

    public function endAt(){

        return Carbon::createFromFormat('H:i:s' , $this->attributes['end_time'])->format('g:i A');
    }

    public function formatedDate($attribute){
        
        return Carbon::createFromFormat('Y-m-d' , $attribute)->format("d F Y");

    }

    public function diffD(){

         $endat = Carbon::createFromFormat('Y-m-d' , $this->attributes['end_date']);

          return $endat->diffInDays(Carbon::now());
    }

    public function diffSeconds(){
        $endat = Carbon::createFromFormat('Y-m-d' , $this->attributes['end_date']);


        return $endat->diffInSeconds(Carbon::now());

    }


    public function diffHours(){
        $endat = Carbon::createFromFormat('Y-m-d' , $this->attributes['end_date']);

        return $endat->diffInHours(Carbon::now());

    }

    public function diffMinutes(){
        $endat = Carbon::createFromFormat('Y-m-d' , $this->attributes['end_date']);

        return $endat->diffInMinutes(Carbon::now());

    }


    public static function  paginate($items, $perPage , $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }



}