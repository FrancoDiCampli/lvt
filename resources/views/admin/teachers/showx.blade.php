@extends('layouts.dashboard')

@section('content')
<div class="container font-montserrat text-sm ">
    <div class="card  rounded-sm bg-gray-100 mx-auto md:mt-10 shadow-lg">
        <div class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
            <h1 class="text-teal-600 font-semibold">{{$job->subject->name}} -> {{$job->title}}</h1>
        </div>
        <div class="card-body py-2">
            <table class="text-gray-700">
                <thead>
                    <tr class="text-center">
                        <th class="md:w-5/12 w-2/12 px-10 ">Name</th>
                        <th class="w-3/12 ">Delivery</th>
                        <th class="w-3/12 ">State</th>
                        <th class="w-3/12 px-10">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entregas ?? [] as $entrega)
                    <tr class="text-center">
                        <td class="w-3/12">{{$entrega->user->name}}</td>
                        <td class="w-3/12 ">{{$entrega->created_at->format('d-m-Y')}}</td>
                        <td class="w-3/12">{{$entrega->state($entrega->state)}}</td>
                        <td class="md:w-3/12 w-9/12">
                            <div class="flex justify-center">
                                <a href="{{route('teacher.delivery', $entrega->id)}}" class="mx-1 text-blue-500">Show</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @foreach ($alumnos ?? [] as $alumno)
                    <tr class="text-center">
                        <td class="w-3/12">{{$alumno->name}}</td>
                        <td class="w-3/12 ">N/D</td>
                        <td class="w-3/12">N/D</td>
                        <td class="md:w-3/12 w-9/12">
                            <div class="flex justify-center">
                                N/D
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
