@extends('layouts.dashboard')

@section('content')
<div class="container font-montserrat text-sm ">
    <div class="card  rounded-sm bg-gray-100 mx-auto md:mt-10 shadow-lg">
        <div class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
        <h1 class="text-teal-600 font-semibold">{{$subject->name}}</h1>
            <a href="{{route('teacher.create', $subject)}}" class="bg-teal-600 text-white text-sm p-2 shadow-lg hover:text-gray-700">New Job</a>

        </div>
        <div class="card-body py-2">
            <table class="text-gray-700">
                <thead>
                    <tr class="text-center">
                        <th class="w-1/12 px-10 hidden md:block">ID</th>
                        <th class="md:w-5/12 w-2/12 px-10 ">Title</th>
                        <th class="w-3/12 ">Start</th>
                        <th class="w-3/12 ">End</th>
                        <th class="w-3/12 px-10">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject->jobs as $job)
                        <tr class="text-center">
                        <td  class="w-1/12 px-10 hidden md:block ">{{$job->id}}</td>
                        <td  class="w-3/12 ">{{$job->title}}</td>
                        <td  class="w-3/12">{{$job->start->format('d-m-Y')}}</td>
                        <td  class="w-3/12">{{$job->end->format('d-m-Y')}}</td>
                        <td  class="md:w-3/12 w-9/12">
                            <div class="flex justify-center">
                                <a href="{{route('teacher.showJob', $job->id)}}" class="mx-1 text-blue-500">Show</a>
                                <a href="{{route('teachers.show', $job->id)}}" class="mx-1 text-teal-500">Deliveries</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
