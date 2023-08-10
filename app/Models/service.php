<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at','updated_at'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class)->withPivot('quantity');
    }
    
       public function delete()
    {
        // delete all related photos 
        $this->images()->delete();
         $this->transactions()->detach();
     
        return parent::delete();
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class  , 'transactions_services')->withPivot('service_order_quantity')
        ->withTimestamps();
    }

    public function image(): Attribute
    {

        return new Attribute(
            get: function($value){
        
               if ($value == null) {
                   
                 return "assets/images/services/service.jpg";

                 
               }
        
               return "uploads/".$value;
            }
        );
    }


    public function images(){

         return $this->hasMany(ServiceImage::class);

    }

    public static function  paginate($items, $perPage , $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()
        ]);
    }

    public function name($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->name)->$lang ;
    }

    public function desc($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->desc)->$lang ;
    }
}
