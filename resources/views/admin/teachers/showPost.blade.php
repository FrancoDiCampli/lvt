@extends('layouts.dashboard')

@section('content')

<div class="card mt-6 md:w-10/12 bg-white shadow-lg p-3 rounded-sm mx-auto flex items-center justify-between">
    <div>
        <p class="text-md text-primary-500 font-semibold">LENGUA</p>
        <p class="text-sm text-primary-400">Priemro A</p>
    </div>
    <div>
          <a href="{{route('posts.index', $post->subject_id)}}" class="flex text-teal-600 font-semibold p-3 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 306 306"><path data-original="#000000" class="active-path" data-old_color="#000000" fill="#A0AEC0" d="M247.35 35.7L211.65 0l-153 153 153 153 35.7-35.7L130.05 153z"/></svg>
          </a>
    </div>
</div>

{{-- card --}}
<div class="flex justify-center mt-2 mb-8">
    <div class="card bg-white rounded-sm w-full md:w-10/12 p-4 shadow-lg">
        <div class=" w-full flex relative items-center border-b">
            <div class="p-2">
                <img class="w-10 h-10 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
            </div>

            <div class="w-9/12">
                <h2 class="text-sm font-medium text-gray-900 -mt-1">{{auth()->user()->name}} </h2>
                <p class="text-gray-700 font-light text-xs">{{$post->created_at}} </p>
            </div>

            <div class="w-3/12 text-right">
                <button onclick="toogleFm()" class="focus:outline-none text-gray-600 hover:bg-gray-300 rounded-full p-2">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="ellipsis-v"
                    class=" h-4 w-4  svg-inline--fa fa-ellipsis-v fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"/></svg>

                </button>
                <div id="float-menu" class="hidden border bg-white absolute p-2 mt-8 text-sm w-auto top-10 right-0 shadow-lg
                rounded-sm text-left">
                    <a href="#" class="block py-2">Editar</a>

                    <a href="" class="block py-2">Eliminar</a>
                </div>
            </div>
        </div>

        <div class="flex mt-6">
            <div class="w-2/3">
                <h1 class="font-semibold text-gray-800 text-lg">
                    {{$post->title}}
                </h1>
            </div>
        </div>
        <div class="py-1 text-sm text-gray-700">
            {{$post->description}}
        </div>
        <div class="py-3 text-md text-gray-800">
            {{$post->content}}
        </div>

        <div class="border-t mt-3 flex pt-3 text-gray-700 text-sm">
            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
            </svg>
            <span>{{count($post->annotations)}} Comentarios de la clase</span>
        </div>

        @foreach ($post->annotations as $annotation)
            <div class=" w-full flex relative items-center mt-3">
                <div class="p-2">
                    <img class="w-8 h-8 rounded-full object-cover mr-1 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
                </div>

                <div class="w-full">
                    <h2 class="text-sm font-medium text-gray-900">{{$annotation->user->name}} </h2>
                    <p class="text-gray-700 font-light text-xs">{{$annotation->created_at}} </p>

                </div>
            </div>

            <div class="text-sm text-gray-700 w-full px-2">
                <p class="text-sm font-medium text-gray-900 ml-10">{{$annotation->annotation}}</p>
            </div>
        @endforeach


        <div class="border-t mt-3 mb-6 pt-6 text-gray-700 text-sm w-full">


            <form action="{{route('annotations.store')}}" method="POST">
                    @csrf
                    <input type="text" name="post_id" value="{{$post->id}}" hidden>
                    <input type="text" name="subject_id" value="{{$post->subject_id}}" hidden>
                    <div
                        class="border border-gray-400 bg-white h-10 rounded-sm py-1 content-center flex items-center">
                        <input name="annotation" type="text" class="bg-transparent focus:outline-none w-full text-sm p-2 text-gray-800" placeholder="Agregar un comentario">
                        <button type="submit" class="text-teal-600 font-semibold p-2 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
                            {{-- <svg aria-hidden="true" data-prefix="fas" data-icon="info" class="h-4 w-4 svg-inline--fa fa-info fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"/></svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 485.725 485.725"  class="h-5 w-5 svg-inline--fa fa-info fa-w-6"><path d="M459.835 196.758L73.531 9.826C48.085-2.507 17.46 8.123 5.126 33.569a51.198 51.198 0 00-1.449 41.384l60.348 150.818h421.7a50.787 50.787 0 00-25.89-29.013zM64.025 259.904L3.677 410.756c-10.472 26.337 2.389 56.177 28.726 66.65a51.318 51.318 0 0018.736 3.631c7.754 0 15.408-1.75 22.391-5.12l386.304-187a50.79 50.79 0 0025.89-29.013H64.025z" data-original="#000000" class="hovered-path active-path" data-old_color="#000000" fill="#374957"/></svg>
                        </button>
                    </div>
                </form>
        </div>




    </div>
</div>

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
