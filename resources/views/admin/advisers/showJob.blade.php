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
        <div class="block">
            <form action="{{route('adviser.updateJob',$job->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="flex pt-8">
                    <span class="text-xs font-semibold py-1">Actualizar Estado</span>
                </div>
                <div class="block">
                    <div class="mx-8">
                        <select id="state" name="state"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state">
                            <option disabled selected value> {{$job->state($job->state)}} </option>
                            <option value="0">Borrador</option>
                            <option value="1">Activa</option>
                            <option value="2">Rechazado</option>
                        </select>
                    </div>
                    <div class="mx-8 mb-2">
                        <button type="submit"
                            class="bg-teal-600 text-white text-sm p-2 mt-4 shadow-lg hover:text-white w-full hover:bg-teal-900 rounded">Update</button>
                    </div>
                </div>

            </form>
        </div>
        <div class="flex justify-center">
            {{-- Youtube --}}
            {{-- <iframe height="600" width="800" src="{{$job->link}}"></iframe> --}}
            <iframe height="600" width="800" src="{{asset('tareas/'. $job->file_path)}}" frameborder="0"></iframe>
        </div>
        <div>
            <a target="_blank" href="{{$job->link}}">
                <pre>{{$job->link}}</pre>
            </a>
        </div>
    </div>
</div>

@endsection