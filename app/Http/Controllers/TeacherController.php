<?php

namespace App\Http\Controllers;

use App\Job;
use App\Subject;
use App\Delivery;
use App\Traits\FilesTrait;
use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index($id)
    {
        $subject = Subject::find($id);
        $subject->jobs;

        return view('admin.teachers.subject', compact('subject'));
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
            'start' => 'required',
            'end' => 'required'
        ]);

        $nameFile = FilesTrait::store($request, $ubicacion = 'tareas', $nombre = $subject->name);

        if ($nameFile) {
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

        $matriculas = $job->subject->course->enrollments;

        $aux = $job->deliveries->keyBy('user_id');

        $faltan = $matriculas->whereNotIn('user_id', $aux->keys());

        $entregas = $job->deliveries()->get();

        $alumnos = $faltan->map(function ($item) {
            return $item->student;
        });

        return view('admin.teachers.show', compact('job', 'entregas', 'alumnos'));
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
        $delivery->comments;
        return view('admin.teachers.delivery', compact('delivery'));
    }
}
