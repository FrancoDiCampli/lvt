@extends('layouts.dashboard')

@section('content')


{{-- nuevo --}}
<div class="card mt-6 md:w-10/12 bg-white shadow-lg p-3 rounded-sm mx-auto flex items-center justify-between">
    <div>
        <p class="text-md text-primary-500 font-semibold">{{$delivery->job->subject->name}}</p>
        <p class="text-sm text-primary-400">{{$delivery->job->subject->course->name}}</p>
    </div>
    <div>
          <a href="{{route('teacher.deliveries', $delivery->job)}}" class="flex text-teal-600 font-semibold p-3 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
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
            <div class="flex w-9/12">
                <div class="">
                    <h1 class="font-semibold text-gray-800 text-lg">
                        Entrega: {{$delivery->job->title}}
                    </h1>
                    <div class="text-sm text-gray-700">
                        Fecha de Inicio: {{$delivery->job->start->format('d-m-Y')}}
                    </div>
                </div>
            </div>

            <div class="w-3/12">
                @if ($delivery->state($delivery->state) === "Aprobado")
                <span class="bg-green-200 text-green-800 float-right rounded-full px-2 py-1 text-xs font-medium hidden md:block">{{$delivery->state($delivery->state)}}</span>
                @endif
                @if ($delivery->state($delivery->state) === "En corrección")
                <span class="bg-gray-200 text-gray-800 float-right rounded-full px-2 py-1 text-xs font-medium hidden md:block">{{$delivery->state($delivery->state)}}</span>
                @endif
                @if ($delivery->state($delivery->state) === "Por Corregir")
                <span class="bg-orange-200 text-orange-800 float-right rounded-full px-2 py-1 text-xs font-medium hidden md:block">{{$delivery->state($delivery->state)}}</span>
                @endif
                @if ($delivery->state($delivery->state) === "Desaprobado")
                <span class="bg-red-200 text-red-800 float-right rounded-full px-2 py-1 text-xs font-medium hidden md:block">{{$delivery->state($delivery->state)}}</span>
                @endif
            </div>



            <div class="w-auto text-right ml-2">
                <button onclick="toogleFm()" class="focus:outline-none text-gray-600 hover:bg-gray-300 rounded-full p-2">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="ellipsis-v"
                    class=" h-4 w-4  svg-inline--fa fa-ellipsis-v fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"/></svg>

                </button>
                <div id="float-menu" class="hidden border bg-white absolute p-2 mt-8 text-sm w-auto top-10 right-0 shadow-lg
                rounded-sm text-left">
                    <a href="" class="block py-2">Editar</a>

                    <a href="" class="block py-2">Eliminar</a>
                </div>
            </div>


        </div>

        {{-- estados responsive --}}
        <div class="text-right">
            {{-- <span class="rounded-full text-gray-100 bg-blue-400 px-2 py-1 text-xs font-medium md:hidden">{{$delivery->state($delivery->state)}}</span> --}}
            @if ($delivery->state($delivery->state) === "Aprobado")
            <span class="rounded-full text-green-800 bg-green-200 px-2 py-1 text-xs font-medium md:hidden">{{$delivery->state($delivery->state)}}</span>
            @endif
            @if ($delivery->state($delivery->state) === "En corrección")
            <span class="rounded-full text-gray-800 bg-gray-200 px-2 py-1 text-xs font-medium md:hidden">{{$delivery->state($delivery->state)}}</span>
            @endif
            @if ($delivery->state($delivery->state) === "Por Corregir")
            <span class="rounded-full text-orange-800 bg-orange-200 px-2 py-1 text-xs font-medium md:hidden">{{$delivery->state($delivery->state)}}</span>
            @endif
            @if ($delivery->state($delivery->state) === "Desaprobado")
            <span class="rounded-full text-red-800 bg-red-200 px-2 py-1 text-xs font-medium md:hidden">{{$delivery->state($delivery->state)}}</span>
            @endif
        </div>
        <div class="text-sm text-gray-700 text-right">
            Fecha de Entrega: {{$delivery->job->end->format('d-m-Y')}}
        </div>

        <div class=" w-full flex relative items-center border-b mb-2 py-3">
            <div class="">
                <img class="w-8 h-8 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
            </div>
            <div class="flex w-full pt-1">
                <div class="w-full">
                    <div class="w-9/12">
                        <h2 class="text-sm font-medium text-gray-900 -mt-1">{{$delivery->user->name}} </h2>
                        <p class="text-gray-700 font-light text-xs">Entregada el {{$delivery->created_at->format('d-m-Y')}}</p>
                    </div>

                </div>
            </div>
        </div>



        <div class="flex justify-center p-2">
            {{-- Youtube --}}
            {{-- <iframe height="600" width="800" src="{{$job->link}}"></iframe> --}}
            {{-- <iframe id="viewer" height="600" width="800" src="{{asset('tareas/'. $job->file_path)}}" frameborder="0"></iframe> --}}
            <iframe id="viewer" src="{{asset('entregas/'. $delivery->file_path)}}" frameborder="0" class="w-full h-64 md:h-screen"></iframe>
        </div>

        <form action="/updateDelivery/{{$delivery->id}}" method="POST">
            @method('PUT')
            @csrf
            <input type="text" hidden name="id_job" value="{{$delivery->job->id}}">
            <div class="border-t mt-3 flex py-6 text-gray-700 text-sm">
                {{-- estados --}}
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Actualizar Estado
                    </label>
                    <div class="relative">
                        <select onchange="setCode()"  id="state" name="state"  class="block hover:bg-gray-300 appearance-none w-full bg-gray-200 border-gray-200 text-gray-700 py-3 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-primary-400 border-b-2" id="grid-state">
                            <option disabled selected value> {{$delivery->state($delivery->state)}} </option>
                            <option value="0">En corrección</option>
                            <option value="1">Por Corregir</option>
                            <option value="2">Aprobado</option>
                            <option value="3">Desaprobado</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                        </div>
                </div>
            </div>

            <button type="submit" class="flex mx-auto btn btn-primary">Save</button>
        </form>

        {{-- Movimientos de la tarea --}}
        <div class="border-t mt-6 flex py-6 text-gray-700 text-sm w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Historial de Entregas
            </label>
        </div>

        {{-- Comentarios --}}
        <div class="border-t mt-3 flex pt-3 text-gray-700 text-sm">
            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
            </svg>
            <span>{{count($delivery->comments)}} Comentarios de la entrega</span>
        </div>

        <div class="flex justify-start mt-2 mb-8">
            <div class="w-full">
                @foreach ($delivery->comments as $item)
                <div class=" w-full flex relative items-center mt-3">
                    <div class="p-2">
                        <img class="w-8 h-8 rounded-full object-cover mr-1 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
                    </div>

                    <div class="w-full">
                        <h2 class="text-sm font-medium text-gray-900">{{$item->user->name}} </h2>
                        <p class="text-gray-700 font-light text-xs">{{$item->created_at}} </p>

                    </div>
                </div>

                <div class="text-sm text-gray-700 w-full px-2">
                    <p class="text-sm font-medium text-gray-900 ml-10">{{$item->comment}}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="border-t mt-3 mb-6 pt-6 text-gray-700 text-sm w-full">
            <form action="{{route('comment.store')}}" method="POST">
                @csrf
                <input type="text" name="delivery" value="{{$delivery->id}}" hidden>
                <div
                    class="border border-gray-400 bg-white h-10 rounded-sm py-1 content-center flex items-center">
                    <input name="comment" type="text" class="bg-transparent focus:outline-none w-full text-sm p-2 text-gray-800" placeholder="Agregar un comentario">
                    <button type="submit" class="text-teal-600 font-semibold p-2 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
                        {{-- <svg aria-hidden="true" data-prefix="fas" data-icon="info" class="h-4 w-4 svg-inline--fa fa-info fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"/></svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 485.725 485.725"  class="h-5 w-5 svg-inline--fa fa-info fa-w-6"><path d="M459.835 196.758L73.531 9.826C48.085-2.507 17.46 8.123 5.126 33.569a51.198 51.198 0 00-1.449 41.384l60.348 150.818h421.7a50.787 50.787 0 00-25.89-29.013zM64.025 259.904L3.677 410.756c-10.472 26.337 2.389 56.177 28.726 66.65a51.318 51.318 0 0018.736 3.631c7.754 0 15.408-1.75 22.391-5.12l386.304-187a50.79 50.79 0 0025.89-29.013H64.025z" data-original="#000000" class="hovered-path active-path" data-old_color="#000000" fill="#374957"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
