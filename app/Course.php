<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
