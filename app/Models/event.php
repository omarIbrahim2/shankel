<?php

namespace App\Models;

use Carbon\Carbon;



use App\Models\School;
use App\Models\Parentt;
use App\Models\Teacher;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function suppliersinEvent()
    {
        return $this->morphedByMany(Supplier::class, 'eventable');
    }


    public function getStatus(){
                 
        
        
         
        
        if (Carbon::now()->format('Y-m-d') >  ($this->attributes['end_date']) ) {
           
             if ($this->attributes['status'] != 'Finished' && $this->attributes['status'] != 'Cancelled' ) {
                $this->update(['status' => 'Finished']);
             }
        } 

        return $this->attributes['status'];
        
           
        
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


    public function formatedToCounter(){


        $date =  Carbon::createFromFormat('Y-m-d' , $this->attributes['start_date'])->format("d F Y");
        $time = Carbon::createFromFormat('H:i:s' , $this->attributes['start_time'])->format('H:i:s');
        return  $date . ' '. $time;
    }
    public function endFormatedToCounter(){


        $endDate =  Carbon::createFromFormat('Y-m-d' , $this->attributes['end_date'])->format("d F Y");
        $endTime = Carbon::createFromFormat('H:i:s' , $this->attributes['end_time'])->format('H:i:s');
        return  $endDate . ' '. $endTime;
    }

    public function diffD(){

       $start =  $this->attributes['start_date'] . " ". $this->attributes['start_time'];

       $end =  $this->attributes['end_date'] . " ". $this->attributes['end_time'];

       $startDate = Carbon::createFromFormat('Y-m-d H:i:s' , $start);
       $endDate = Carbon::createFromFormat('Y-m-d H:i:s' , $end);

       $days = $startDate->diffInDays($endDate);

       return $days;
    }




    public function diffHours(){


        $start_time = Carbon::createFromFormat('H:i:s' , $this->attributes['start_time']);
        $end_time = Carbon::createFromFormat('H:i:s' ,$this->attributes['end_time'] );



        $hours = $start_time->diffInHours($end_time);

        return $hours;

    }

    public function diffMinutes(){

        $start_time = Carbon::createFromFormat('H:i:s' , $this->attributes['start_time']);
        $end_time = Carbon::createFromFormat('H:i:s' ,$this->attributes['end_time'] );
        $minutes= $start_time->diffInMinutes($end_time);




        return $minutes < 60 ? $minutes : $minutes % 60;


    }


    // public function status():Attribute
    // {

    //    return new Attribute(
    //        get:function(){
    //         if ($this->diffD() <= 0 && $this->attributes['status'] != 'Cancelled') {
    //             $currentTime =  Carbon::now()->format('H:i:s');



    //             $endTime = Carbon::createFromFormat("H:i:s" , $this->attributes['end_time']);

    //             if ($currentTime > $endTime) {
    //                return 'Finished';
    //             }


    //         }

    //         return "In Progress";

    //        }
    //    );
    // }


    public function image(): Attribute
    {

        return new Attribute(
            get: function($value){
               return "uploads/".$value;
            }
        );
    }

    public static function  paginate($items, $perPage , $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function title($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->title)->$lang ;
    }

    public function desc($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->desc)->$lang ;
    }

}
