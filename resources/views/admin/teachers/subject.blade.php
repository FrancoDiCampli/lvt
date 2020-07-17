@extends('layouts.dashboard')

@section('content')


    {{-- <div class="card mt-2 md:w-10/12 bg-white shadow-lg p-3 rounded-sm mx-auto flex justify-between items-center">
        <div>
            <p class="sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold placeholder-gray-700">Muro de la Clase</p>
            <p class="md:text-md text-sm text-primary-500 font-semibold">{{$subject->name}}</p>
            <p class="md:text-sm text-xs text-primary-400">{{$subject->course->name}}</p>
        </div>
        <div>
        <a href="{{route('admin.teacher', $subject->id)}}" class="flex hover:shadow-lg px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 306 306"><path data-original="#000000" class="active-path" data-old_color="#000000" fill="#A0AEC0" d="M247.35 35.7L211.65 0l-153 153 153 153 35.7-35.7L130.05 153z"/></svg>
              </a>
        </div>
    </div>

    <div class="card md:w-10/12 bg-gray-100 border-t shadow-lg p-3 rounded-sm mx-auto flex justify-between items-center">
        <form action="#" method="POST">
            @csrf
            <div
                class="border border-gray-400 bg-white h-10 rounded-sm py-1 content-center flex items-center">
                <input name="annotation" type="text" class="bg-transparent focus:outline-none w-full text-sm p-2 text-gray-800" placeholder="Buscar...">
                <button type="submit" class="text-teal-600 font-semibold p-2 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 485.725 485.725"  class="h-5 w-5 svg-inline--fa fa-info fa-w-6"><path d="M459.835 196.758L73.531 9.826C48.085-2.507 17.46 8.123 5.126 33.569a51.198 51.198 0 00-1.449 41.384l60.348 150.818h421.7a50.787 50.787 0 00-25.89-29.013zM64.025 259.904L3.677 410.756c-10.472 26.337 2.389 56.177 28.726 66.65a51.318 51.318 0 0018.736 3.631c7.754 0 15.408-1.75 22.391-5.12l386.304-187a50.79 50.79 0 0025.89-29.013H64.025z" data-original="#000000" class="hovered-path active-path" data-old_color="#000000" fill="#374957"/></svg>
                </button>
            </div>
        </form>
    </div> --}}

    <div class="card md:w-10/12 rounded-sm bg-gray-100 mx-auto mt-6 mb-4 shadow-lg">
        <div class="card-title bg-white w-full p-5 border-b flex items-center justify-between">
            <div>
                <p class="sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold placeholder-gray-700">Muro de la Clase</p>
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
            <a href="{{route('new.post', $subject->id)}}" class="hidden md:block btn btn-primary md:m-0 m-3">New Post</a>
            <a href="{{route('new.post', $subject->id)}}" class="flex md:hidden btn-primary md:m-0 m-3 p-1">
                <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
                <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                        C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                        C15.952,9,16,9.447,16,10z" />
                </svg>
            </a>
        </div>
    </div>


    <div class="mb-8">
    @if(count($posts)>0)
    @foreach ($posts as $post)
        {{-- post card --}}
        <div class="card my-2 md:w-10/12 bg-white shadow-lg p-3 rounded-sm mx-auto">
            <div class=" w-full flex relative items-center ">
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

            <div class="flex justify-between items-center px-2">
                <p class="mt-1 text-gray-700 text-lg">{{$post->title}}</p>
            </div>
            <div class="flex justify-between items-center px-2">
                <p class="text-gray-700 text-sm">
                    {{$post->description}}
                </p>
            </div>

            <div class="flex items-center px-2 pt-4">
                <div class="flex mr-4 text-gray-700 text-sm">
                <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                </svg>
                <span>{{count($post->annotations)}}</span>
                </div>
                <a href="{{route('posts.show', $post->id)}}" class="flex mr-4 text-gray-700 text-sm items-center">
                    {{-- <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                    </svg> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999"class="w-4 h-4 mr-1" stroke="currentColor"><path d="M508.745 246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818 239.784 3.249 246.035a16.896 16.896 0 000 19.923c4.569 6.257 113.557 153.206 252.748 153.206s248.174-146.95 252.748-153.201a16.875 16.875 0 000-19.922zM255.997 385.406c-102.529 0-191.33-97.533-217.617-129.418 26.253-31.913 114.868-129.395 217.617-129.395 102.524 0 191.319 97.516 217.617 129.418-26.253 31.912-114.868 129.395-217.617 129.395z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#4A5568"/><path d="M255.997 154.725c-55.842 0-101.275 45.433-101.275 101.275s45.433 101.275 101.275 101.275S357.272 311.842 357.272 256s-45.433-101.275-101.275-101.275zm0 168.791c-37.23 0-67.516-30.287-67.516-67.516s30.287-67.516 67.516-67.516 67.516 30.287 67.516 67.516-30.286 67.516-67.516 67.516z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#4A5568"/></svg>
                    <span>Ver</span>
                    </a>
            </div>
        </div>
    @endforeach

    @else
            <h1>No posee posts</h1>
    @endif
    </div>

    <div class="mx-auto pt-1 pb-8">
        {{ $posts->links() }}
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
