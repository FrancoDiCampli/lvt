@extends('layouts.dashboard')

@section('content')

    <div class="md:w-6/12 mx-auto">
        <div class="w-full bg-white h-8 rounded-full px-5 py-1 content-center">
            <input type="text" class="bg-transparent focus:outline-none w-full  text-sm   ">
        </div>
        <div class="flex justify-between py-5 md:text-sm text-xs">
            <button id="materias" data-order="materias" class="btn bg-teal-600 rounded-full text-white py-1 px-5">Materias</button>
            <button id="fechas" data-order="fechas" class="btn bg-indigo-600 rounded-full text-white py-1 px-5">Fechas</button>
            <button id="estado" data-order="estados" class="btn bg-red-600 rounded-full text-white py-1 px-5">Estado</button>
        </div>

        <button id="order" onclick="toogleOrder()" data-order="" class="my-5 relative text-gray-700 flex items-center focus:outline-none">

            <svg aria-hidden="true" data-prefix="fas" data-icon="sort-amount-down"
                class="h-3 w-3 svg-inline--fa fa-sort-amount-down fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M304 416h-64a16 16 0 00-16 16v32a16 16 0 0016 16h64a16 16 0 0016-16v-32a16 16 0 00-16-16zm-128-64h-48V48a16 16 0 00-16-16H80a16 16 0 00-16 16v304H16c-14.19 0-21.37 17.24-11.29 27.31l80 96a16 16 0 0022.62 0l80-96C197.35 369.26 190.22 352 176 352zm256-192H240a16 16 0 00-16 16v32a16 16 0 0016 16h192a16 16 0 0016-16v-32a16 16 0 00-16-16zm-64 128H240a16 16 0 00-16 16v32a16 16 0 0016 16h128a16 16 0 0016-16v-32a16 16 0 00-16-16zM496 32H240a16 16 0 00-16 16v32a16 16 0 0016 16h256a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg>
            <p class="mx-2">Order By <span id="topic"></span> </p>

            <ul id="orderOption" class="absolute hidden top-10 left-0 bg-white border shadow-lg">
                <li id="item"></li>
            </ul>
        </button>
        @foreach ($alumnos ?? [] as $alumno)
        @if (count($alumno['delivery'])>0)
        <div class="card my-2 w-full  bg-white shadow-lg p-5 border-l-2 border-teal-600 rounded-sm">
            <div class=" w-full  flex justify-end relative">
                <button onclick="toogleFm()" class="focus:outline-none">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="ellipsis-v"
                    class=" h-4 w-4  svg-inline--fa fa-ellipsis-v fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"/></svg>

                </button>
                    <div id="float-menu" class="hidden border bg-white absolute p-2 text-sm w-6/12 md:w-3/12  top-10 right-0 shadow-lg
                    rounded-sm" >
                        <a href="{{route('teacher.delivery', $alumno['delivery'][0]->id)}}" class="block py-2">Entrega</a>

                        <a href="{{route('teacher.descargarDelivery', $alumno['delivery'][0]->file_path)}}" class="block py-2">Descargar</a>
                </div>

            </div>

            <div class="flex justify-between items-center">
                <div class="text-gray-700">
                    <h1 class="pb-2">{{$job->title}}</h1>
                    <h3 class="font-semibold">{{$alumno['student']->name}}</h3>
                    <p class="italic">Fecha entrega <span>{{$alumno['delivery'][0]->created_at->format('d-m-Y')}}</span> </p>
                </div>
                <div>
                    {{-- <button class="bg-red-600 rounded-full text-white py-1 px-5">{{$job->state($alumno['delivery'][0]->state)}}</button> --}}
                    <span class="inline-block rounded-full text-green-700 bg-green-200 px-2 py-1 text-xs font-bold mr-3">{{$job->state($job->state)}}</span>
                </div>
            </div>

        </div>
        @else
            {{-- <h1>No deliveries</h1> --}}
        @endif
        @endforeach



    </div>

@push('js')
    <script>
        let topicos = {
            "materias":[
                {'name':'Matematica'},
                {'name':'Lengua'},
                {'name':'Geografia'},
            ],
            "estados":[
                {'name':'Activa'},
                {'name':'Inactiva'},
                {'name':'Entregada'},
                {'name':'Rechazada'},
                {'name':'Aprobada'},
            ],
            "fechas":[
                {'name':'Trimestre 1'},
                {'name':'Trimestre 2'},
                {'name':'Trimestre 3'},
            ]
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

            let item = document.getElementById('item')
            item.innerHTML = ''
            topicos[attribute].forEach(element => {
                    console.log(element)
                   item.innerHTML +=  '<li id="item">'+element.name+'</li>'
            });

            console.log(topicos[attribute])



        }

        function toogleFm(){
            fm.classList.toggle('hidden')

        }
        function toogleOrder(){
            oo.classList.toggle('hidden')

        }


    </script>
@endpush
@endsection
