<?php

namespace App;

use App\Job;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $guarded = [];

    protected $state = ['inactive', 'delivered', 'rejected', 'accepted'];

    public function state($value)
    {
        return Arr::get($this->state, $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class)->with('subject');
    }

    public function subject(){

        return $this->job();

    }
}
