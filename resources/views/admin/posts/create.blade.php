@extends('layouts.dashboard')

@section('content')


{{-- card post --}}
<div class="container font-montserrat text-sm mb-8">
    <div class="card  rounded-sm bg-gray-100 mx-auto mt-6 shadow-lg md:w-10/12">
        <div class="card-title bg-white w-full p-5 border-b flex items-center justify-between md:justify-between">
            <div>
                <p class="sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold placeholder-gray-700">Nueva Publicación</p>
                <p class="md:text-md text-sm text-primary-500 font-semibold">{{$subject->name}}</p>
                <p class="md:text-sm text-xs text-primary-400">{{$subject->course->name}}</p>
            </div>
            <a href="{{route('posts.index', $subject->id)}}" class="flex text-teal-600 font-semibold p-3 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 306 306"><path data-original="#000000" class="active-path" data-old_color="#000000" fill="#A0AEC0" d="M247.35 35.7L211.65 0l-153 153 153 153 35.7-35.7L130.05 153z"/></svg>
              </a>
        </div>
        <div class="card-body py-4">
            <form method="POST" action="{{ route('posts.store') }}" class="mx-auto" >
                @csrf
                <input hidden type="text" value="{{$subject->id}}" name="subject_id" >
                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Título
                        </label>
                        <input type="text" id="title" name="title" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Título de la publicación" value="">
                        <span class="flex italic text-red-600  text-sm" role="alert">
                            {{$errors->first('title')}}
                        </span>
                    </div>
                </div>
                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Descripción
                        </label>
                        <input type="text" id="description" name="description" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Breve descripción de la publicación" value="">
                        <span class="flex italic text-red-600  text-sm" role="alert">
                            {{$errors->first('description')}}
                        </span>
                    </div>
                </div>
                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-1">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Contenido
                        </label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Contenido de la publicación" value=""></textarea>
                        <span class="flex italic text-red-600  text-sm" role="alert">
                            {{$errors->first('content')}}
                        </span>
                    </div>
                </div>

                <button type="submit" class="flex mx-auto btn btn-primary">Save</button>

            </form>
        </div>
    </div>
</div>


@endsection

