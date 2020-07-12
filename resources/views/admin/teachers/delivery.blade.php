@extends('layouts.dashboard')

@section('content')


{{-- card --}}
<div class="flex justify-center p-6">
    <div class="card bg-white rounded sm:w-10/12  p-4 shadow-lg">
        <div class="flex">
            <div class="w-2/3">
                <h1 class="font-semibold">
                    {{$delivery->job->title}}
                </h1>
                <span class="block text-xs uppercase text-teal-600">{{$delivery->job->subject->name}}</span>
            </div>
            <div class="w-1/3">
                {{-- <span class="float-right text-xs bg-blue-400 rounded px-2 py-1 text-white">Activo</span> --}}
                <span
                    class="float-right rounded-full text-green-700 bg-green-200 px-2 py-1 text-xs font-bold mr-3">Activo</span>
            </div>
        </div>
        <div class="py-4 text-sm">
            {{$delivery->job->description}}
        </div>
        <div class="flex justify-center">
            <iframe height="600" width="800" src="{{asset('entregas/'. $delivery->file_path)}}"
                frameborder="0"></iframe>
        </div>
        <form action="/updateDelivery/{{$delivery->id}}" method="POST">
            @method('PUT')
            @csrf
            <input type="text" hidden name="id_job" value="{{$delivery->job->id}}">
            <div class="flex pt-8">
                <span class="text-xs font-semibold py-1">Actualizar Estado</span>
                {{-- <span class="text-xs font-semibold py-1 ml-auto text-blue-600">75%</span> --}}
            </div>
            <div class="flex pt-2">
                {{-- @if ($delivery->state == 2 || $delivery->state == 3)
                <input disabled type="text" value="{{$delivery->state($delivery->state)}}">
                @else --}}
                <select id="state" name="state"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                    <option disabled selected value> {{$delivery->state($delivery->state)}} </option>
                    <option value="0">En corrección</option>
                    <option value="1">Por Corregir</option>
                    <option value="2">Aprobado</option>
                    <option value="3">Desaprobado</option>
                </select>

                <button type="submit"
                    class="bg-teal-600 text-white text-sm p-2 mt-4 shadow-lg hover:text-white w-full hover:bg-teal-900 rounded">Update</button>
                {{-- @endif --}}

            </div>

        </form>

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