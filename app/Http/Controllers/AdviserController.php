<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class AdviserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:adviser');
    }

    public function showJob($id)
    {
        $job = Job::find($id);
        $file = url('tareas/'.$job->file_path);
        return view('admin.advisers.showJob', compact('job', 'file'));
    }

    public function updateJob(Request $request, $id)
    {
        Job::where('id', $id)->update(['state' => $request->state]);
        return redirect()->action('AdminController@adviser');
    }

    public function eraser(){
        $jobs = Job::where('state', 0)->get();
        return view('admin.advisers.eraserIndex', compact('jobs'));
    }

    public function active(){
        $jobs = Job::where('state', 1)->get();
        return view('admin.advisers.activeIndex', compact('jobs'));
    }

    public function rejected(){
        $jobs = Job::where('state', 2)->get();
        return view('admin.advisers.rejectedIndex', compact('jobs'));
    }
}
