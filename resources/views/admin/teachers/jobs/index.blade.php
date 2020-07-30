@extends('layouts.dashboard')

@section('content')

    <div class="card md:w-10/12 rounded-sm bg-gray-100 mx-auto mt-6 mb-4 shadow-lg">
        <div class="card-title bg-white w-full p-5 border-b flex items-center justify-between">
            <div>
                <p class="sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold placeholder-gray-700">Tareas de la Clase</p>
                <p class="md:text-md text-sm text-primary-500 font-semibold">{{$subject->name}}</p>
                <p class="md:text-sm text-xs text-primary-400">{{$subject->course->name}}</p>
            </div>
            <div>
            <a href="{{route('admin.teacher', $subject->id)}}" class="flex text-teal-600 font-semibold p-3 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 306 306"><path data-original="#000000" class="active-path" data-old_color="#000000" fill="#A0AEC0" d="M247.35 35.7L211.65 0l-153 153 153 153 35.7-35.7L130.05 153z"/></svg>
                  </a>
            </div>
        </div>

        <div class="w-auto mx-auto flex items-center justify-between p-5">
            <form action="#" method="POST">
            @csrf
            <div
                class="border border-gray-400 bg-white h-10 rounded-sm py-1 content-center flex items-center">
                <input name="annotation" type="text" class="bg-transparent focus:outline-none w-full text-sm p-2 text-gray-800" placeholder="Buscar...">
                <button type="submit" class="text-teal-600 font-semibold p-2 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 0 136 136.219"  class="h-5 w-5 svg-inline--fa fa-info fa-w-6"><path d="M93.148 80.832c16.352-23.09 10.883-55.062-12.207-71.41S25.88-1.461 9.531 21.632C-6.816 44.723-1.352 76.693 21.742 93.04a51.226 51.226 0 0055.653 2.3l37.77 37.544c4.077 4.293 10.862 4.465 15.155.387 4.293-4.075 4.465-10.86.39-15.153a9.21 9.21 0 00-.39-.39zm-41.84 3.5c-18.245.004-33.038-14.777-33.05-33.023-.004-18.246 14.777-33.04 33.027-33.047 18.223-.008 33.008 14.75 33.043 32.972.031 18.25-14.742 33.067-32.996 33.098h-.023zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#374957"/></svg>
                </button>
            </div>
        </form>
        <a href="{{route('teacher.create', $subject->id)}}" class="hidden md:block btn btn-primary md:m-0 m-3">Nueva Tarea</a>
            <a href="{{route('teacher.create', $subject->id)}}" class="flex md:hidden btn-primary md:m-0 m-3 p-1">
                <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
                <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                        C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                        C15.952,9,16,9.447,16,10z" />
                </svg>
            </a>
        </div>
    </div>


    <div class="mb-8">
    @if(count($subject->jobs)>0)
    @foreach ($subject->jobs as $job)
        {{-- post card --}}
        <div class="card my-2 md:w-10/12 bg-white shadow-lg p-3 rounded-sm mx-auto border-l-2 border-primary-400">
            <div class=" w-full flex relative items-center ">
                <div class="p-2 w-10 h-10 rounded-full object-cover mr-4 shadow bg-primary-400 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path d="M4 6.75A4.756 4.756 0 018.75 2h9.133a2.745 2.745 0 00-2.633-2H3.75A2.752 2.752 0 001 2.75v15.5A2.752 2.752 0 003.75 21H4z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/><path d="M20.25 4H8.75A2.752 2.752 0 006 6.75v14.5A2.752 2.752 0 008.75 24h11.5A2.752 2.752 0 0023 21.25V6.75A2.752 2.752 0 0020.25 4zm-2 17h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-4h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-3.5h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-4h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/></svg>
                </div>

                <div class="w-auto md:w-6/12">
                    <a href="{{route('teacher.showJob', $job->id)}}">
                        <p class="md:text-md text-sm font-semibold text-gray-900 -mt-1 md:pt-0 pt-2 hover:text-primary-400">{{$job->title}} </p>
                    </a>
                    <p class="text-gray-700 font-light text-xs">Fecha limite: {{$job->end->format('d-m-Y')}} </p>
                </div>

                <div class="md:w-6/12">
                    @if ($job->state($job->state) === "Borrador")
                        <span class="float-right rounded-full text-gray-100 bg-gray-600 px-2 py-1 text-xs font-medium hidden md:block">{{$job->state($job->state)}}</span>
                    @endif
                    @if ($job->state($job->state) === "Rechazado")
                        <span class="float-right rounded-full text-red-100 bg-red-600 px-2 py-1 text-xs font-medium hidden md:block">{{$job->state($job->state)}}</span>
                    @endif
                    @if ($job->state($job->state) === "Activa")
                        <span class="float-right rounded-full text-green-100 bg-green-600 px-2 py-1 text-xs font-medium hidden md:block">{{$job->state($job->state)}}</span>
                    @endif

                </div>


                <div class="w-3/12 md:w-1/12 text-right">
                    <button onclick="toogleFm()" class="focus:outline-none text-gray-600 hover:bg-gray-300 rounded-full p-2">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="ellipsis-v"
                        class=" h-4 w-4  svg-inline--fa fa-ellipsis-v fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"/></svg>

                    </button>
                    <div id="float-menu" class="hidden border bg-white absolute p-2 mt-8 text-sm w-auto top-10 right-0 shadow-lg
                    rounded-sm text-left">
                        <a href="{{route('teachers.edit',$job->id)}}" class="block py-2">Editar</a>

                        <a href="" class="block py-2">Borrador</a>
                    </div>
                </div>
            </div>

            <div class="flex items-center px-2 pt-2">
                <div class="flex mr-4 text-gray-700 text-sm items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -15 424.066 424" class="w-4 h-4 mr-1"><path d="M374 232.79v-90.798c-.031-26.07-21.16-47.195-47.23-47.222h-2.102v-1.188c-.027-26.07-21.148-47.2-47.219-47.23h-75.488c-.86 0-1.676-.36-2.254-.993l-27.39-29.957A47.326 47.326 0 00137.46.032H47.219C21.152.061.027 21.186 0 47.253v263.57c.027 26.067 21.152 47.188 47.219 47.219H210.19a113.896 113.896 0 00.918 20.89l.012.063c.012.11.027.215.047.324l1.723 9.91a7 7 0 0012.898 2.399l5.168-8.61c32.805-54.554 74.688-58.593 93.39-57.242v45.883a7.002 7.002 0 0011.966 4.938l85.714-86.149a7.001 7.001 0 00-.023-9.898zM47.219 344.042c-18.336-.023-33.2-14.883-33.219-33.219V47.254c.02-18.34 14.883-33.2 33.219-33.223h90.242a33.3 33.3 0 0124.523 10.817l27.375 29.941a17.053 17.053 0 0012.602 5.563h75.488c18.34.023 33.203 14.89 33.223 33.23v1.191H131.898c-26.066.028-47.191 21.153-47.218 47.22v168.831c-.024 18.34-14.89 33.2-33.23 33.219zm165.332-5.914a119.21 119.21 0 00-1.028 5.914H84.977a47.052 47.052 0 0013.699-33.219V141.992c.023-18.336 14.883-33.199 33.222-33.219h194.868c18.343.016 33.207 14.88 33.23 33.22v76.866l-23.71-23.597a7 7 0 00-11.938 4.96v44.352c-44.47 1.48-66.442 19.93-69.508 22.715a121.888 121.888 0 00-42.29 70.84zm125.8 16.574v-35.16a7 7 0 00-5.886-6.91 98.054 98.054 0 00-46.774 4.719c-24.02 8.418-44.691 25.32-61.543 50.308-.328-8.992.391-17.988 2.137-26.812 4.985-25.188 17.633-46.336 37.602-62.864.148-.12.293-.254.43-.39.203-.192 20.601-19.11 65.746-19.11h1.292c3.864 0 7-3.132 7-7v-34.418l68.817 68.473zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#4A5568"/></svg>
                    <a href="{{route('teacher.deliveries', $job->id)}}" class="hover:text-gray-900">
                    <span>{{count($job->deliveries)}} Entregas</span>
                </a>
                </div>
            </div>
        </div>
    @endforeach

    @else
            <h1>No posee posts</h1>
    @endif
    </div>

    <div class="mx-auto pt-1 pb-8">
        {{-- {{ $posts->links() }} --}}
    </div>

{{--
    </div>
</div> --}}

@push('js')
    <script>
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
@endsection
