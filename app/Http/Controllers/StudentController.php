<?php

namespace App\Http\Controllers;

use App\Job;
use App\Comment;
use App\Delivery;
use Illuminate\Http\Request;
use App\Traits\StudentsTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function penddings(){
        $jobs = StudentsTrait::pendding();
        return view('admin.students.penddings',compact('jobs'));
    }

    public function descargar($job)
    {
        $file = public_path('tareas/') . $job;
        return response()->download($file);
    }

    public function deliver($job)
    {
        $job = Job::find($job);


        return view('admin.students.create', compact('job'));
    }

    public function store(Request $request)
    {

        try {
            DB::transaction(function () use ($request) {
                if ($request->file->getClientOriginalExtension() == 'pdf') {
                    $nameFile = time() . '_' . auth()->user()->name . '.pdf';
                    $path = public_path('entregas/');
                    $request->file->move($path, $nameFile);
                }

                $delivery = Delivery::create([
                    'job_id' => $request->job,
                    'file_path' => $nameFile,
                    'state' => 1,
                    'user_id' => Auth::user()->id,
                ]);

                // Si tiene comentarios los crea
                if($request->comment){
                   Comment::create([
                       'user_id'=>Auth::user()->id,
                       'delivery_id'=> $delivery->id,
                       'comment'=> $request->comment,
                   ]);
                }



            });

            session()->flash('message', 'Entrega creada');
        } catch (\Throwable $th) {
            session()->flash('message', 'Error');
        }

        return redirect()->to('/student');
    }

    public function deliveries(){

        $deliveries = Delivery::where('user_id',Auth::id())->with('comments')->get();

       return view('admin.students.deliveries',compact('deliveries'));
    }

    public function updateDelivery(Request $request, $id)
    {
        Delivery::where('id', $id)

          ->update(['state' => $request->state]);
    }

    public function show($id){
       $delivery = Delivery::find($id);
       return view('admin.students.delivery',compact('delivery'));

    }

    public function addComment(Request $request){

            Comment::create([
                'user_id'=>Auth::user()->id,
                'delivery_id'=> $request->delivery,
                'comment'=> $request->comment,
            ]);

        return redirect()->back();
    }

}
