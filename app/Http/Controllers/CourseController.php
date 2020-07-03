<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index(){
        $courses =  Course::all();
        return view('admin.courses.index',compact('courses'));
    }
    public function create(){
        return view('admin.courses.create');
    }

    public function store(Request $request){
        $course = $request->validate([
            'name'=>'required|max:20',
            'code'=>'required|max:20|unique:courses'
        ]);

       Course::create($course);
       return redirect()->route('courses.index')->with('messages', 'Course creado correctamente.');;
    }

    public function edit($id){
        $course = Course::find($id);

        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course){
        $courseValidate = $request->validate([
            'name' => 'required|max:20',
            'code' => ['required', 'max:20', Rule::unique('courses')->ignore($course)],
        ]);

        $course->update($courseValidate);

        return redirect()->route('courses.index')->with('messages', 'Course actualizado correctamente.');
    }
}
