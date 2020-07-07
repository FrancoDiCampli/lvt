@extends('layouts.dashboard')

@section('content')
<div class="container font-montserrat text-sm ">
    <div class="card  rounded-sm bg-gray-100 mx-auto md:mt-10 shadow-lg">
        <div
            class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
            <h1 class="text-teal-600 font-semibold">{{$job->subject->name}} -> {{$job->title}}</h1>
        </div>
        <div class="card-body py-2">
            <table class="text-gray-700">
                <thead>
                    <tr class="text-center">
                        <th class="md:w-5/12 w-2/12 px-10 ">Name</th>
                        <th class="w-3/12 ">Delivery</th>
                        <th class="w-3/12 ">State</th>
                        <th class="w-3/12 px-10">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entregas ?? [] as $entrega)
                    <tr class="text-center">
                        <td class="w-3/12">{{$entrega->user->name}}</td>
                        <td class="w-3/12 ">{{$entrega->created_at->format('d-m-Y')}}</td>
                        <td class="w-3/12">{{$entrega->state($entrega->state)}}</td>
                        <td class="md:w-3/12 w-9/12">
                            <div class="flex justify-center">
                                <a href="{{route('teacher.descargarDelivery', $entrega->file_path)}}"
                                    class="mx-1 text-teal-800">
                                    <svg aria-hidden="true" data-prefix="fas" data-icon="info"
                                        class="h-4 w-4 svg-inline--fa fa-info fa-w-6" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z" />
                                        </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @foreach ($alumnos ?? [] as $alumno)
                    <tr class="text-center">
                        <td class="w-3/12">{{$alumno->name}}</td>
                        <td class="w-3/12 ">N/D</td>
                        <td class="w-3/12">N/D</td>
                        <td class="md:w-3/12 w-9/12">
                            <div class="flex justify-center">
                                <a href="#"
                                    class="mx-1 text-teal-800">
                                    <svg aria-hidden="true" data-prefix="fas" data-icon="info"
                                        class="h-4 w-4 svg-inline--fa fa-info fa-w-6" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z" />
                                        </svg>
                                </a>
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