@extends('layouts.dashboard')

@section('content')

{{-- Nuevo --}}
{{-- nuevo --}}
<div class="card mt-6 md:w-10/12 bg-white shadow-lg p-3 rounded-sm mx-auto flex items-center justify-between">
    <div>
        <p class="text-md text-primary-500 font-semibold">{{$job->subject->name}}</p>
        <p class="text-sm text-primary-400">{{$job->subject->course->name}}</p>
    </div>
    <div>
          <a href="{{route('teacher.index', $job->subject->id)}}" class="flex text-teal-600 font-semibold p-3 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 306 306"><path data-original="#000000" class="active-path" data-old_color="#000000" fill="#A0AEC0" d="M247.35 35.7L211.65 0l-153 153 153 153 35.7-35.7L130.05 153z"/></svg>
          </a>
    </div>
</div>

{{-- card --}}
<div class="flex justify-center mt-2 mb-8">
    <div class="card bg-white rounded-sm w-full md:w-10/12 p-4 shadow-lg">
        <div class=" w-full flex relative items-center border-b mb-2 pb-3">
            <div class="p-2 w-10 h-10 rounded-full object-cover mr-4 shadow bg-primary-400 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path d="M4 6.75A4.756 4.756 0 018.75 2h9.133a2.745 2.745 0 00-2.633-2H3.75A2.752 2.752 0 001 2.75v15.5A2.752 2.752 0 003.75 21H4z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/><path d="M20.25 4H8.75A2.752 2.752 0 006 6.75v14.5A2.752 2.752 0 008.75 24h11.5A2.752 2.752 0 0023 21.25V6.75A2.752 2.752 0 0020.25 4zm-2 17h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-4h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-3.5h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-4h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/></svg>
            </div>
            <div class="flex w-full">
                <div class="w-2/3">
                    <h1 class="font-semibold text-gray-800 text-lg">
                        ENTREGAS {{$job->title}}
                    </h1>
                    <div class="text-sm text-gray-700">
                        Fecha de Inicio: {{$job->start->format('d-m-Y')}}
                    </div>
                </div>
            </div>

            @if ($job->state($job->state) === "Borrador")
            <span class="float-right rounded-full text-gray-100 bg-gray-600 px-2 py-1 text-xs font-medium hidden md:block">{{$job->state($job->state)}}</span>
            @endif
            @if ($job->state($job->state) === "Rechazado")
                <span class="float-right rounded-full text-red-100 bg-red-600 px-2 py-1 text-xs font-medium hidden md:block">{{$job->state($job->state)}}</span>
            @endif
            @if ($job->state($job->state) === "Activa")
                <span class="float-right rounded-full text-green-100 bg-green-600 px-2 py-1 text-xs font-medium hidden md:block">{{$job->state($job->state)}}</span>
            @endif



            <div class="w-auto text-right ml-2">
                <button onclick="toogleFm()" class="focus:outline-none text-gray-600 hover:bg-gray-300 rounded-full p-2">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="ellipsis-v"
                    class=" h-4 w-4  svg-inline--fa fa-ellipsis-v fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"/></svg>

                </button>
                <div id="float-menu" class="hidden border bg-white absolute p-2 mt-8 text-sm w-auto top-10 right-0 shadow-lg
                rounded-sm text-left">
                    <a href="{{route('teachers.edit',$job->id)}}" class="block py-2">Editar</a>

                    <a href="" class="block py-2">Eliminar</a>
                </div>
            </div>


        </div>

        <div class="text-right">
            @if ($job->state($job->state) === "Borrador")
            <span class="rounded-full text-gray-100 bg-gray-600 px-2 py-1 text-xs font-medium md:hidden">{{$job->state($job->state)}}</span>
            @endif
            @if ($job->state($job->state) === "Rechazado")
                <span class="rounded-full text-red-100 bg-red-600 px-2 py-1 text-xs font-medium md:hidden">{{$job->state($job->state)}}</span>
            @endif
            @if ($job->state($job->state) === "Activa")
                <span class="rounded-full text-green-100 bg-green-600 px-2 py-1 text-xs font-medium md:hidden">{{$job->state($job->state)}}</span>
            @endif
        </div>
        <div class="text-sm text-gray-700 text-right">
            Fecha de Entrega: {{$job->end->format('d-m-Y')}}
        </div>


        {{-- prueba --}}
        <div class="card-body py-2 my-2">
            <div class="overflow-x-auto">
                <table class="table-auto border-collapse w-full">
                    <thead>
                        <tr class="px-5 py-3 border-b border-primary-400 text-left font-semibold text-gray-800">
                            <th class="px-4 py-2">Alumno</th>
                            <th class="px-4 py-2 hidden md:block" >Entrega</th>
                            <th class="px-4 py-2" >Estado</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
                        @foreach ($entregas ?? [] as $entrega)
                            <tr class="hover:bg-gray-100 border-b border-gray-200 bg-white text-sm">
                                <td class="px-4 py-2">{{$entrega->user->name}}</td>
                                <td class="px-4 py-2 mt-1 hidden md:block">{{$entrega->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-2">
                                    @if ($entrega->state($entrega->state) === "Aprobado")
                                    <span class="bg-green-200 py-1 px-2 rounded-full text-green-800">{{$entrega->state($entrega->state)}}</span>
                                    @endif
                                    @if ($entrega->state($entrega->state) === "En corrección")
                                    <span class="bg-gray-200 py-1 px-2 rounded-full text-gray-800">{{$entrega->state($entrega->state)}}</span>
                                    @endif
                                    @if ($entrega->state($entrega->state) === "Por Corregir")
                                    <span class="bg-orange-200 py-1 px-2 rounded-full text-orange-800">{{$entrega->state($entrega->state)}}</span>
                                    @endif
                                    @if ($entrega->state($entrega->state) === "Desaprobado")
                                    <span class="bg-red-200 py-1 px-2 rounded-full text-red-800">{{$entrega->state($entrega->state)}}</span>
                                    @endif

                                    </td>
                                <td class="px-4 py-2">
                                    <div class="flex">
                                        <a href="{{route('teacher.delivery', $entrega->id)}}" class="mx-1 text-blue-400 hover:bg-gray-200 rounded-full p-2 focus:bg-gray-300">
                                            <svg aria-hidden="true" data-prefix="fas" data-icon="info" class="h-4 w-4 svg-inline--fa fa-info fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"/></svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @foreach ($alumnos ?? [] as $alumno)
                            <tr class="hover:bg-gray-100 border-b border-gray-200 bg-white text-sm">
                                <td class="px-4 py-2">{{$alumno->name}}</td>
                                <td class="px-4 py-2 hidden md:block">S/E</td>
                                <td class="px-4 py-2">
                                    <span class="">S/E</span>
                                    </td>
                                <td class="px-4 py-2">
                                    <span class="">S/E</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
