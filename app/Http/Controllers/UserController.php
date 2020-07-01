<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

use App\Imports\StudentsImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if($user->hasRole('teacher')){
            $data = Teacher::where('user_id',$user->id)->get();

        }elseif($user->hasRole('student')){
            $data = Student::where('user_id',$user->id)->get();
        }else{
            $data=[];
        }

        return view('admin.users.create',compact('user','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();



       if($user->hasRole('teacher')){
        Teacher::create($request->all());

       }elseif($user->hasRole('student')){
        Student::create($request);
       }
        // $request->user_id = intval($request->user_id);
        // Teacher::create($request->all());
        // if($user->role ==='teacher'){
        //     return 'is teacher';
        //     Teacher::create($request->all());

        // }elseif($user->role ==='student'){
        //     Student::create($request);
        // }else{
        //     $data=[];
        // }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if($user->hasRole('teacher')){
            $data = Teacher::where('user_id',$user->id)->get();

        }elseif($user->hasRole('student')){
            $data = Student::where('user_id',$user->id)->get();
        }else{
            $data=[];
        }
        return view('admin.users.show',compact('user','data'));
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

    public function import(){

        return view('admin.users.import');
    }
    public function importUsers(Request $request){

        Excel::import(new StudentsImport, request()->file('file'));
        // Excel::import(new StudentsImport, asset('files/students.xlsx'));
    }
}
