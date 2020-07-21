@extends('layouts.dashboard')

@section('content')


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
                        {{$job->title}}
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


        <div class="py-3 text-md text-gray-800 mt-3 mb-3">
            {{$job->description}}
        </div>

        <div class="flex justify-center p-2">
            {{-- Youtube --}}
            {{-- <iframe height="600" width="800" src="{{$job->link}}"></iframe> --}}
            {{-- <iframe id="viewer" height="600" width="800" src="{{asset('tareas/'. $job->file_path)}}" frameborder="0"></iframe> --}}
            <iframe id="viewer" src="{{asset('tareas/'. $job->file_path)}}" frameborder="0" class="w-full h-64 md:h-screen"></iframe>
        </div>

        @if ($job->link)
            <div class="flex justify-center mt-6">
                    <div class="w-full flex relative items-center border-t pt-4">
                        <div class="p-2 w-16 h-16 items-center">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path d="M4 6.75A4.756 4.756 0 018.75 2h9.133a2.745 2.745 0 00-2.633-2H3.75A2.752 2.752 0 001 2.75v15.5A2.752 2.752 0 003.75 21H4z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/><path d="M20.25 4H8.75A2.752 2.752 0 006 6.75v14.5A2.752 2.752 0 008.75 24h11.5A2.752 2.752 0 0023 21.25V6.75A2.752 2.752 0 0020.25 4zm-2 17h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-4h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-3.5h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-4h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/></svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 477.867 477.867" class="w-10 h-10 inline-block"><path d="M238.933 0C106.974 0 0 106.974 0 238.933s106.974 238.933 238.933 238.933 238.933-106.974 238.933-238.933C477.726 107.033 370.834.141 238.933 0zm0 443.733c-113.108 0-204.8-91.692-204.8-204.8s91.692-204.8 204.8-204.8 204.8 91.692 204.8 204.8c-.122 113.058-91.742 204.678-204.8 204.8z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#1E5E7F"/><path d="M339.557 231.32a17.068 17.068 0 00-7.662-7.662l-136.533-68.267c-8.432-4.213-18.682-.794-22.896 7.638a17.068 17.068 0 00-1.8 7.637V307.2c-.004 9.426 7.633 17.07 17.059 17.075a17.068 17.068 0 007.637-1.8l136.533-68.267c8.436-4.204 11.867-14.452 7.662-22.888zM204.8 279.586V198.28l81.306 40.653-81.306 40.653z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#1E5E7F"/></svg>
                        </div>
                        <div class="flex w-full">
                            <div class="w-full">
                                <h1 class="font-semibold text-gray-800 text-md">
                                    Recurso Audiosivual
                                </h1>
                                <div class="text-sm text-gray-700">
                                    <a href="{{$job->link}}" target="_blank">
                                        Clic para ver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @endif

        <div class="border-t mt-3 flex pt-3 text-gray-700 text-sm">
            {{-- Movimientos de la tarea --}}
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


        let fm = document.getElementById('float-menu')
        let oo = document.getElementById('orderOption')

        let bt = document.getElementsByClassName('btn')

        Array.from(bt).forEach(function(element) {
        element.addEventListener('click', setOrder);
        });

        function setOrder(){
            let attribute = this.getAttribute("data-order");

            document.getElementById('topic').innerHTML = attribute

        }

        function toogleFm(){
            fm.classList.toggle('hidden')

        }
        function toogleOrder(){
            oo.classList.toggle('hidden')

        }
</script>

@endpush


