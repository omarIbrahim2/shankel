<?php

namespace App\Models;

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
}
