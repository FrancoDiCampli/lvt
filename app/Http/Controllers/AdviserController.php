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
        return view('admin.advisers.showJob', compact('job'));
    }

    public function updateJob(Request $request, $id)
    {
        Job::where('id', $id)->update(['state' => $request->state]);
        return redirect()->action('AdminController@adviser');
    }
}
