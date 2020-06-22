<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;
use App\Traits\StudentsTrait;
use App\Traits\TeachersTrait;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function teacher()
    {

        // $year = now()->format('Y');
        // $subjects = TeachersTrait::subjects($year);
        return view('admin.teachers.index');
    }

    public function student(){

        $user = Auth::user();
        // $deliveries =  Delivery::where('user_id',$user->id)->get();

        // $jobs = StudentsTrait::pendding();
        // $subjects = $user->materias();

        return view('admin.students.index',compact('user'));


    }
}
