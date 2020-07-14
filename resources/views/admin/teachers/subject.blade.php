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





    </div>


    @if(count($posts)>0)
    @foreach ($posts as $post)
    <!-- post card -->
    <div class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto m-6"><!--horizantil margin is just for display-->
        <div class="flex items-start px-4 py-6">
        <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
        <div class="">
            <div class="flex items-center justify-between pt-2">
                <h2 class="text-md font-medium text-gray-900 -mt-1">{{auth()->user()->name}} </h2>

            </div>
            <p class="text-gray-600 text-xs">{{$post->created_at}} </p>
            <h3 class="py-4 pb-2 text-lg font-semibold text-gray-800">{{$post->title}}</h3>
            <p class="mt-1 text-gray-700 text-md">
                {{$post->description}}
            </p>
            <div class="mt-4 flex items-center">
                <div class="flex mr-2 text-gray-700 text-sm mr-8">
                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                    </svg>
                    <span>8</span>
                </div>
                <div class="flex mr-2 text-gray-700 text-sm mr-4">
                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    <span>share</span>
                </div>
            </div>
        </div>
        </div>
    </div>
    @endforeach

    @else
            <h1>No posee posts</h1>
    @endif

    <div class="w-full rounded-lg overflow-hidden shadow-lg bg-white mx-auto">
        <div class="flex flex-col min-h-full">
          <div class="px-6 py-4 border-b">
            <div class="text-xl text-center">Block</div>
          </div>
          <div class="px-6 py-10 flex-grow">
            <p class="text-gray-700 text-base">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
            </p>
          </div>
          <div class="px-5 py-3 border-t bg-gray-100 flex justify-end">
            <button class="btn-gradient-default text-gray-600 font-medium text-sm py-1 px-5 rounded mr-3">Cancel</button>
            <button class="btn-gradient-danger text-white font-medium text-sm py-1 px-5 rounded">Block</button>
          </div>
        </div>
      </div>



        <div class="comments mt-10">
            <h1 class="text-2xl font-rubik">Posts</h1>
        <a href="{{route('new.post',$subject->id)}}">New Post</a>
        @if(count($posts)>0)
            @foreach ($posts as $post)
            <div class="card bg-white w-10/12 p-5 my-3">
                <div class="card-title">
                    <h1>{{$post->title}}</h1>
                <h4>Author: {{auth()->user()->name}}</h4>
                    <span>Published: {{$post->created_at}}</span>
                    <span>{{$post->description}}</span>
                    <p>{{$post->content}}</p>
                </div>

            </div>
                @foreach ($post->annotations as $annotation)
                <div class="card bg-white w-8/12 p-5">
                    <div class="card-title">
                        <h4>Author: {{$annotation->user->name}}</h4>
                        <h1>{{$annotation->annotation}}</h1>

                        <span>Published: {{$annotation->created_at}}</span>
                    </div>

                </div>
                @endforeach

                <div>
                <form action="{{route('annotations.store')}}" method="POST">
                        @csrf
                        <input type="text" name="post_id" value="{{$post->id}}" hidden>
                        <input type="text" name="subject_id" value="{{$subject->id}}" hidden>
                        <div
                            class="w-8/12 mx-5 border border-gray-600 bg-white h-8 rounded-full px-5 py-1 content-center flex items-center">
                            <input name="annotation" type="text" class="bg-transparent focus:outline-none w-full  text-sm   ">
                            <button type="submit" class="text-teal-600 font-semibold">Comment</button>
                        </div>
                    </form>
                </div>
            @endforeach

        @else
                <h1>No posee posts</h1>
        @endif


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
