<?php

namespace App\Http\Controllers;

use App\Job;
use App\Subject;
use App\Delivery;
use Illuminate\Http\Request;
use App\Traits\TeachersTrait;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index($id)
    {
        $subject = Subject::find($id);
        $subject->jobs;
        // $states = ['Activas', 'Terminadas', 'Rechazadas'];
        // $year = now()->format('Y');
        // $subjects = TeachersTrait::subjects($year);
        // $jobs = collect();
        // $subjects->each(function ($subject) use ($jobs) {
        //     $subject->jobs->each(function ($job) use ($jobs) {
        //         $jobs->push($job);
        //     });
        // });

        return view('admin.teachers.subject', compact('subject'));
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
        try {
            DB::transaction(function () use ($request, $subject) {
                if ($request->file->getClientOriginalExtension() == 'pdf') {
                    $nameFile = time() . '_' . $subject->name . '.pdf';
                    $path = public_path('tareas/');
                    $request->file->move($path, $nameFile);

                    Job::create([
                        'title' => $request->title,
                        'description' => $request->description,
                        'subject_id' => $request->subject,
                        'file_path' => $nameFile,
                        'start' => $request->start,
                        'end' => $request->end,
                        'state' => 1,
                    ]);
                }
            });

            session()->flash('message', 'Tarea creada');
        } catch (\Throwable $th) {
            session()->flash('message', 'Error');
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

    public function delivery($delivery){

        $delivery =  Delivery::find($delivery);
        return view('admin.teachers.delivery', compact('delivery'));
    }
}
