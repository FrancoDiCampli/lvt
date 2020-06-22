<?php

namespace App\Traits;

trait TeachersTrait
{
    public static function teacher()
    {
        return auth()->user()->teacher;
    }

    public static function subjects($year)
    {
        return auth()->user()->subjects()->whereYear('created_at', $year)->get()->each(function ($sub) {
            $sub->course;
            $sub->jobs->each->deliveries;
        });
    }
}
