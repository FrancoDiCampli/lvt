<?php

namespace App\Http\Controllers;

use App\Job;
use App\Post;
use App\Subject;
use App\Delivery;
use Illuminate\Http\Request;
use App\Traits\TeachersTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index($id)
    {
        $subject = Subject::find($id);
        $subject->jobs;

        // $posts = Post::where('user_id',Auth::user()->id)->where('course_id',$subject->course_id)->with('annotations')->get();
        $posts = Post::where('user_id',Auth::user()->id)->where('subject_id',$id)->with('annotations')->get();

        return view('admin.teachers.subject', compact('subject','posts'));
    }

    public function create($subject)
    {
        // return view('jobs.create', compact('subject'));
    }

    public function nuevaTarea($subject)
    {
        $subject = Subject::find($subject);
        return view('admin.teachers.create', compact('subject'));
    }

    public function store(Request $request)
    {
        $subject = Subject::find($request->subject);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'subject' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        if ($request->file->getClientOriginalExtension() == 'pdf' || $request->file->getClientOriginalExtension() == 'docx') {
            $nameFile = time() . '_' . $subject->name . '.' . $request->file->getClientOriginalExtension();
            $path = public_path('tareas/');
            $request->file->move($path, $nameFile);

            $data['file_path'] = $nameFile;
            $data['subject_id'] = $data['subject'];
            $data['state'] = 1;

            Job::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'subject_id' => $data['subject'],
                'file_path' => $nameFile,
                'start' => $data['start'],
                'end' => $data['end'],
                'state' => 1,
            ]);
        }

        return redirect()->action('TeacherController@index', $subject->id);
    }

    public function show($id)
    {
        $job = Job::find($id);
        $matriculas = $job->subject->course()->get()[0]->enrollments;
        $alumnos = collect();


        foreach ($matriculas as $mat) {
            $alumno = collect();
            $alumno->put('student', $mat->student);
            $aux = $mat->student->deliveries()->get()->where('job_id', $job->id);
            $alumno->put('delivery', $aux->flatten());
            $alumnos->push($alumno);
        }

        // return $alumnos;

        return view('admin.teachers.show', compact('job', 'alumnos'));
    }

    public function edit($id)
    {
        //
    }



    public function destroy($id)
    {
        //
    }

    public function descargar($job)
    {
        $file = public_path('tareas/') . $job;
        return response()->download($file);
    }

    public function descargarDelivery($delivery)
    {
        $file = public_path('entregas/') . $delivery;
        return response()->download($file);
    }

    public function filtrar(Request $request)
    {
        $filtros = collect();
        foreach ($request->params as $param) {
            $filtros->push(str_replace('tag-', '', $param));
        }

        return $subject = Subject::where('name', $filtros->first())->with('jobs')->get();
    }

    public function delivery($delivery)
    {

        $delivery =  Delivery::find($delivery);
        return view('admin.teachers.delivery', compact('delivery'));
    }
}
