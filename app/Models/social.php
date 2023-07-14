<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at','updated_at'];

    public function address($lang = null){
        $lang = $lang ?? App::getLocale();
        return json_decode($this->address)->$lang ;
    }
}
