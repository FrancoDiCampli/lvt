<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(){
        $enrollments = Enrollment::all();
        return view('admin.enrollments.index',compact('enrollments'));
    }

    public function create(){
        $students = User::role('student')->get();
        $matriculados =  Enrollment::where('cicle',2020)->get();

        $courses = Course::all();
        return view('admin.enrollments.create',compact('students','courses'));
    }

    public function store(Request $request){
        $enrollment = $request->validate([
            'user_id'=>'required',
            'course_id'=>'required',
        ]);

        $enrollment['cicle'] =  2020;

        Enrollment::create($enrollment);
        return redirect()->route('enrollments.index');
    }
}
