<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // protected $guarded = [];
    protected $fillable = ['name', 'code', 'course_id', 'user_id'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class)->orderBy('id', 'DESC');
    }

    public function posts()
    {

        return $this->hasMany(Post::class);
    }
}
