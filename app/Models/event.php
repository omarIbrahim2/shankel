<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at','updated_at'];

    public function eventable()
    {
        return $this->morphTo('creator');
    }

    public function Parentts()
    {
        return $this->morphedByMany(Parentt::class, 'subscriber');
    }

    public function schools()
    {
        return $this->morphedByMany(School::class, 'subscriber');
    }

    public function teacher()
    {
        return $this->morphedByMany(Teacher::class, 'subscriber');
    }

    public function suppliers()
    {
        return $this->morphedByMany(Supplier::class, 'subscriber');
    }

}
