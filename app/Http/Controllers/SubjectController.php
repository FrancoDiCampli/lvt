<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
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

    public function edit($id){
        $subject = Subject::find($id);
        $teachers = User::role('teacher')->get();
        $courses = Course::all();

        return view('admin.subjects.edit', compact('subject', 'teachers', 'courses'));
    }

    public function update(Request $request, Subject $subject){
        $course_id = Course::where('code',$request->course_id)->first();

        $subjectValidate = $request->validate([
            'name' => 'required|max:20',
            'user_id' => 'required',
            'code' => ['required', 'max:20', Rule::unique('subjects')->ignore($subject)],
        ]);

        $subjectValidate['course_id'] =  $course_id->id;

        $subject->update($subjectValidate);

        return redirect()->route('subjects.index')->withStatus(__('Subject actualizado correctamente.'));
    }
}
