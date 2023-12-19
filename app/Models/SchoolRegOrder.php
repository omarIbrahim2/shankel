<?php

namespace App\Models;

use App\Models\School;
use App\Models\Parentt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolRegOrder extends Model
{
    use HasFactory;

    protected $guarded = ['id' , 'created_at' , 'updated_at'];


    public function school(){

          return $this->belongsTo(School::class , 'school_id');
    }


    public function parentt(){

        return $this->belongsTo(Parentt::class , 'parentt_id');
    }
}
