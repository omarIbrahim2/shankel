<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addvert extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function addverttable()
    {
        return $this->morphTo('creator');
    }

}
