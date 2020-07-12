<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(){
        $subjects =  Subject::all();
        return view('admin.subjects.index',compact('subjects'));
    }

    public function create(){
        $teachers = User::role('teacher')->get();
        $courses = Course::all();
        return view('admin.subjects.create',compact('teachers','courses'));
    }

    public function store(Request $request){
        $course_id = Course::where('code',$request->course_id)->first();

        $subject = $request->validate([
            'name'=>'required|max:20',
            'code'=>'required|max:20|unique:subjects',
            'user_id'=>'required'
        ]);

        $subject['course_id'] =  $course_id->id;

        Subject::create($subject);
        return redirect()->route('subjects.index');
    }
}
