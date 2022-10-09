<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at','updated_at'];


    public function cardable()
    {
        return $this->morphTo('user');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

}
