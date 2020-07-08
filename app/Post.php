<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function annotations()
    {
        return $this->hasMany('App\Annotation');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
