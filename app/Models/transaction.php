<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at','updated_at'];

    public function transactionable()
    {
        return $this->morphTo('user');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class , 'transactions_services')->withTimestamps();
    }
    
    public function getUserType($value){
        
        if ($value == 'App\Models\Parentt') {
            return substr($value , 11 ,6);
        }

        return substr($value , 11);
        
    }
}
