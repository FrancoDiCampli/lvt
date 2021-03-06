<?php

namespace App\Http\Controllers;

use App\Job;
use App\Post;
use App\Subject;
use App\Delivery;
use App\JobComment;
use App\Traits\FilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:teacher')->except('addJobComment');
    }

    public function index($id)
    {
        $subject = Subject::find($id);
        $subject->jobs;

        // $posts = Post::where('user_id',Auth::user()->id)->where('subject_id',$id)->with('annotations')->orderBy('created_at', 'DESC')->paginate(2);

        return view('admin.teachers.jobs.index', compact('subject'));
    }

    public function create($subject)
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
            'link' => 'nullable|url',
            'file' => 'required|file',
            'start' => 'date',
            'end' => 'date|after_or_equal:'.$request->start,
            'comment' => 'nullable|min:3'
        ]);

        $vid = substr($data['link'], -11);

        $nameFile = FilesTrait::store($request, $ubicacion = 'tareas', $nombre = $subject->name);

        if ($nameFile) {
            $data['subject_id'] = $data['subject'];
            $data['state'] = 0;

            $job = Job::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'subject_id' => $data['subject'],
                'file_path' => $nameFile,
                'link' => $vid,
                'start' => $data['start'],
                'end' => $data['end'],
                'state' => 0,
            ]);

            // Si tiene comentarios los crea
            // if ($request->comment) {
            //     JobComment::create([
            //         'user_id' => Auth::user()->id,
            //         'job_id' => $job->id,
            //         'comment' => $data['comment'],
            //     ]);
            // }
        }
        session()->flash('messages', 'Tarea creada');
        return redirect()->action('TeacherController@index', $subject->id);
    }

    public function show($id)
    {
        $job = Job::find($id);

        $matriculas = $job->subject->course->enrollments;

        $aux = $job->deliveries->keyBy('user_id');

        $faltan = $matriculas->whereNotIn('user_id', $aux->keys());

        $entregas = $job->deliveries()->get();

        $alumnos = $faltan->map(function ($item) {
            return $item->student;
        });

        return view('admin.teachers.deliveries', compact('job', 'entregas', 'alumnos'));
    }

    public function showJob($id)
    {
        $job = Job::find($id);
        $file = url('tareas/'.$job->file_path);
        return view('admin.teachers.showJob', compact('job','file'));
    }

    public function edit($id)
    {
        $job = Job::find($id);
        return view('admin.teachers.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        $subject = Subject::find($request->subject);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable|url',
            'start' => 'date',
            'end' => 'date'
        ]);
        $data['subject_id'] = $subject->id;
        $data['state'] = 0;

        if ($request->file) {
            $nameFile = FilesTrait::update($request, 'tareas', $subject->name, $job);
            $data['file_path'] = $nameFile;
        }

        $job->update($data);
        session()->flash('messages', 'Tarea actualizada');
        return redirect()->action('TeacherController@index', $subject->id);
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
        $delivery->comments;
        return view('admin.teachers.delivery', compact('delivery'));
    }

    public function addJobComment(Request $request)
    {
        $datos = $request->validate([
            'comment' => 'min:3',
        ]);
        JobComment::create([
            'user_id' => Auth::user()->id,
            'job_id' => $request->job,
            'comment' => $datos['comment'],
        ]);

        return redirect()->back();
    }
}
