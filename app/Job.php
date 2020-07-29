<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    protected $state = ['Borrador', 'Activa', 'Rechazado'];

    public function state($value)
    {
        return Arr::get($this->state, $value);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class)->with('user');
    }

    public function comments()
    {
        return $this->hasMany('App\JobComment');
    }


    protected $casts = [
        'start' => 'datetime:d-m-Y',
        'end' => 'datetime:d-m-Y'
    ];
}
