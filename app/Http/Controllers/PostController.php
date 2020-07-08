<?php

namespace App\Http\Controllers;

use App\Post;
use App\Subject;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create($id)
    {
        $subject = Subject::find($id);
        return view('admin.posts.create',compact('subject'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub = Subject::where('id',$request->subject_id)->get();

        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'subject_id'=>$request->subject_id,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('teacher.index',$request->subject_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
