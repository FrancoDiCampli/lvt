<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    protected $state = ['inactive', 'active', 'completed', 'finished'];

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

    protected $casts = [
        'start' => 'datetime:d-m-Y',
        'end' => 'datetime:d-m-Y'
    ];
}
