<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // protected $guarded = [];
    protected $fillable = ['name','dni','phone','address','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
