@extends('layouts.dashboard')

@section('content')

    <div class="card w-8/12 bg-white">

            <div class="card-title">
            <h1>{{$delivery->job->subject->name}}  - {{$delivery->job->title}}</h1>
            </div>

            <div class="card-body">
                <div>
                <p>Fecha de entrega <span>{{$delivery->created_at->format('d-m-Y')}}</span></p>
                <textarea class="border boder-gray-600" name="" id="" cols="30" rows="10">
                    {{$delivery->job->description}}
                </textarea>
                <p><a href="{{route('teacher.descargarDelivery', $delivery->file_path)}}" class="block py-2">Descargar</a> </p>
        <form action="{{route('update.delivery',$delivery->id)}}" method="POST">
            @method('PUT')
            @csrf
                <select id="course" name="state" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option disabled selected value> -- select a course -- </option>

                        <option value="0">Inactivo</option>
                        <option value="1">Delivered</option>
                        <option value="2">Rejected</option>
                        <option value="3">Aprobado</option>

                </select>

                </div>

            </div>
            <button type="submit" class="w-2/12 bg-teal-600 ">Update</button>
        </form>


    </div>


@endsection
