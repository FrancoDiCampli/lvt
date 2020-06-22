<?php

namespace App\Traits;

trait UsersTrait
{
    public static function userLogged()
    {
        $user = collect();

        if (auth()->user()->roles->first()->name == 'student') {
            $user->put('student', StudentsTrait::student());
            $user->put('enrollment', StudentsTrait::enrollment(2020));
        }

        if (auth()->user()->roles->first()->name == 'teacher') {
            $user->put('teacher', TeachersTrait::teacher());
            $user->put('subjects', TeachersTrait::subjects(2020));
        }

        return $user;
    }
}
