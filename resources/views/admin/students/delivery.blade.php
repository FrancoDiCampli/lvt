@extends('layouts.dashboard')

@section('content')
<div class="container font-montserrat text-sm ">
    <div class="card  rounded-sm bg-gray-100 mx-auto md:mt-10 shadow-lg">
        <div
            class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
            <h1 class="text-teal-600 font-semibold">{{$delivery->job->subject->name}}>{{$delivery->job->title}}</h1>
        </div>
        <div class="card-body py-5">
            <div class="w-6/12 p-5">
                <label class="font-semibold" for="">Description:</label>
                <span>{{$delivery->job->description}}</span>
            </div>
            <div class="w-6/12 p-5">
                <label class="font-semibold" for="">Job</label>
                <a href="">{{$delivery->job->file_path}}</a>
            </div>
            <div class="w-6/12 p-5">
                <label class="font-semibold" for="">Delivery</label>
                <a href="">{{$delivery->file_path}}</a>
            </div>

            <div class="w-full p-5">
                <iframe height="400" width="600" src="{{asset('entregas/'. $delivery->file_path)}}"
                    frameborder="0"></iframe>
            </div>

            <div class="w-6/12 ">
                <h1 class="font-semibold px-5">Comments</h1>
                <div class="relative w-1/2 m-8">
                    <div class="border-r-2 border-gray-500 absolute h-full top-0" style="left: 15px">
                    </div>
                    <ul class="list-none m-0 p-0">

                        @foreach ($delivery->comments as $item)
                        <li class="mb-2">
                            <div class="flex items-center mb-1">
                                <div class="bg-gray-500 rounded-full h-8 w-8"></div>
                                <div class="flex-1 ml-4  font-semibold">{{$item->user->name}}: </div>
                            </div>
                            <div class="ml-12">
                                {{$item->comment}}
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>

            </div>

            <div>
                <form action="{{route('comment.store')}}" method="POST">
                    @csrf
                    <input type="text" name="delivery" value="{{$delivery->id}}" hidden>
                    <div
                        class="w-8/12 mx-5 border border-gray-600 bg-white h-8 rounded-full px-5 py-1 content-center flex items-center">
                        <input name="comment" type="text" class="bg-transparent focus:outline-none w-full  text-sm   ">
                        <button type="submit" class="text-teal-600 font-semibold">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
