<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function image(): Attribute
    {

        return new Attribute(
            get: function ($value) {
                return "uploads/" . $value;
            }
        );
    }

    public function title($lang = null)
    {
        $lang = $lang ?? App::getLocale();
        return json_decode($this->title)->$lang;
    }
}
