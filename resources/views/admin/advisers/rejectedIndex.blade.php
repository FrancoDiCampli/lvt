@extends('layouts.dashboard')

@section('content')

{{-- nuevo --}}
<div class="card mt-6 md:w-10/12 bg-white shadow-lg p-3 rounded-sm mx-auto flex items-center justify-between">
    <div>
        <p class="text-md text-primary-500 font-semibold">ASESORÍA</p>
        <p class="text-sm text-primary-400">Revisión de Trabajos</p>
    </div>
    <div>
        <a href="{{route('admin.adviser')}}" class="flex text-teal-600 font-semibold p-3 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 306 306"><path data-original="#000000" class="active-path" data-old_color="#000000" fill="#A0AEC0" d="M247.35 35.7L211.65 0l-153 153 153 153 35.7-35.7L130.05 153z"/></svg>
          </a>
    </div>
</div>


{{-- card --}}
<div class="flex justify-center mt-2 mb-8">
    <div class="card bg-white rounded-sm w-full md:w-10/12 p-4 shadow-lg">
        <div class=" w-full flex relative items-center border-b mb-2 pb-3">
            <div class="p-2 w-10 h-10 rounded-full object-cover mr-4 shadow bg-primary-400 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path d="M4 6.75A4.756 4.756 0 018.75 2h9.133a2.745 2.745 0 00-2.633-2H3.75A2.752 2.752 0 001 2.75v15.5A2.752 2.752 0 003.75 21H4z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/><path d="M20.25 4H8.75A2.752 2.752 0 006 6.75v14.5A2.752 2.752 0 008.75 24h11.5A2.752 2.752 0 0023 21.25V6.75A2.752 2.752 0 0020.25 4zm-2 17h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-4h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-3.5h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5zm0-4h-7.5a.75.75 0 010-1.5h7.5a.75.75 0 010 1.5z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF"/></svg>
            </div>
            <div class="flex w-full">
                <div class="w-2/3">
                    <h1 class="font-semibold text-gray-800 text-lg">
                        TAREAS RECHAZADAS
                    </h1>
                    <div class="text-sm text-gray-700">
                        {{count($jobs)}} Tareas rechazadas
                    </div>
                </div>
            </div>

            <div class="w-auto text-right ml-2">
                <p onclick="toogleFm()" class="bg-red-600 rounded-full p-3"></p>
            </div>
        </div>


        @if (count($jobs) > 0)
        {{-- prueba --}}
        <div class="card-body py-2 my-2">
            <div class="overflow-x-auto">
                <table class="table-auto border-collapse w-full">
                    <thead>
                        <tr class="px-5 py-3 border-b border-primary-400 text-left font-semibold text-gray-800">
                            <th class="px-1 py-2">Materia</th>
                            <th class="px-1 py-2">Curso</th>
                            <th class="px-4 py-2 hidden md:block" >Tarea</th>
                            <th class="px-4 py-2" >Fecha</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
                        @foreach ($jobs ?? [] as $job)
                            <tr class="hover:bg-gray-100 border-b border-gray-200 bg-white text-sm">
                                <td class="px-1 py-2">{{$job->subject->name}}</td>
                                <td class="px-1 py-2">{{$job->subject->course->name}}</td>
                                <td class="px-4 py-2 mt-1 hidden md:block">{{$job->title}}</td>
                                <td class="px-4 py-2">{{$job->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-2">
                                    <div class="flex">
                                        <a href="{{route('adviser.showJob',$job->id)}}" class="mx-1 text-blue-400 hover:bg-gray-200 rounded-full p-2 focus:bg-gray-300">
                                            <svg aria-hidden="true" data-prefix="fas" data-icon="info" class="h-4 w-4 svg-inline--fa fa-info fa-w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"/></svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @else
        {{-- mensaje de exito --}}
        <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 mt-6">
			<div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-green-500">
					<svg fill="currentColor"
						 viewBox="0 0 20 20"
						 class="h-6 w-6">
						<path fill-rule="evenodd"
							  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
							  clip-rule="evenodd"></path>
					</svg>
				</span>
			</div>
			<div class="alert-content ml-4">
				<div class="alert-title font-semibold text-lg text-green-800">
                    Éxito
				</div>
				<div class="alert-description text-sm text-green-600">
					No tienes tareas rechazadas.
				</div>
			</div>
        </div>
        @endif

    </div>
</div>

@endsection
