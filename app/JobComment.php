<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobComment extends Model
{
    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
