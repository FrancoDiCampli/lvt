<?php

namespace App\Traits;

use App\Job;
use App\Delivery;
use Illuminate\Support\Facades\Auth;

trait StudentsTrait
{
    public static function student()
    {
        return auth()->user()->student;
    }

    public static function enrollment($year)
    {
        return auth()->user()->enrollments->where('cicle', $year)->first()->course;
    }

    public static function pendding(){
        $user = Auth::user();
        $materias = $user->materias();

        // $materias->modelkeys();

        $tareas = Job::whereIn('subject_id', $materias->modelkeys())->where('state',1)->get();

        $deliveries = Delivery::where('user_id',$user->id)->get();

        $ex = [];
        foreach($deliveries as $delivery){
            array_push($ex,$delivery->job_id);
        }

        $jobs = $tareas->except($ex);

        return $jobs;

    }
}
