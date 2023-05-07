<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolRegOrder extends Model
{
    use HasFactory;

    protected $guarded = ['id' , 'created_at' , 'updated_at'];


    public function school(){

          return $this->belongsTo(School::class);
    }


    public function parentt(){

        return $this->belongsTo(Parentt::class);
    }
}
