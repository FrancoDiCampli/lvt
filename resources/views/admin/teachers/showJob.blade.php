@extends('layouts.dashboard')

@section('content')

<div class="flex justify-center p-6">
    <div class="card bg-white rounded sm:w-10/12  p-4 shadow-lg">
        <div class="flex">
            <div class="w-2/3">
                <h1 class="font-semibold">
                    {{$job->title}}
                </h1>
                <span class="block text-xs uppercase text-teal-600">{{$job->subject->name}}</span>
            </div>
            <div class="w-1/3">
                <span
                    class="float-right rounded-full text-green-700 bg-green-200 px-2 py-1 text-xs font-bold mr-3">{{$job->state($job->state)}}</span>
            </div>
            <div>
                <a class="rounded-full bg-orange-500 font-semibold text-white p-1"
                    href="{{route('teachers.edit',$job->id)}}">edit</a>
            </div>
        </div>
        <div class="py-4 text-sm">
            {{$job->description}}
        </div>
        <div class="flex justify-around items-center">
            <div class="flex items-center">
                <pre>Fecha Inicio: </pre><span
                    class="block text-xs uppercase text-teal-600">{{$job->start->format('d-m-Y')}}</span>
            </div>
            <div class="flex items-center">
                <pre>Fecha Fin: </pre><span
                    class="block text-xs uppercase text-teal-600">{{$job->end->format('d-m-Y')}}</span>
            </div>
        </div>
        <div class="flex justify-center">
            {{-- Youtube --}}
            {{-- <iframe height="600" width="800" src="{{$job->link}}"></iframe> --}}
            <iframe id="viewer" height="600" width="800" src="{{asset('tareas/'. $job->file_path)}}" frameborder="0"></iframe>
        </div>
        <div>
            <a target="_blank" href="{{$job->link}}">
                <pre>{{$job->link}}</pre>
            </a>

        </div>
    </div>
</div>

@endsection

@push('js')

<script>
    let ancho = screen.width;
        if (ancho <= 640) {
            let marco = document.getElementById('viewer');
            marco.setAttribute('height',200);
            marco.setAttribute('width',270);
        }
</script>

@endpush


