<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
