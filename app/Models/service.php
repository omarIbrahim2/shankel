<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Card::class);
    }
}
