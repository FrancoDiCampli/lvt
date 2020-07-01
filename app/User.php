<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function materias()
    {
        $matri = Enrollment::where('user_id', Auth::user()->id)->where('cicle', 2020)->get();
        $curso = Course::where('id', $matri[0]->course_id)->get();
        return Subject::where('course_id', $curso[0]->id)->get();
    }


    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class)->orderBy('id', 'DESC');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Teachers
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
