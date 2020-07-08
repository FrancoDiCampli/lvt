<?php

namespace App\Http\Controllers;

use App\Annotation;
use Illuminate\Http\Request;

class AnnotationController extends Controller
{
    public function store(Request $request){

        Annotation::create([
            'annotation'=>$request->annotation,
            'post_id'=>$request->post_id,
            'user_id'=>auth()->user()->id
        ]);



        return redirect()->route('teacher.index',$request->subject_id);
    }
}
