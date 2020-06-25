@extends('layouts.dashboard')

@section('content')

<div class="container font-montserrat text-sm ">

    {{-- Mensaje de validacion --}}
    @if ($errors->any())
        <div class="row align-items-center">
            <div class="col">
                {{-- <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                    <span class="block sm:inline"><p>{{$error}}</p></span>
                    </li>
                     @endforeach
                </ul> --}}

                <div class="flex items-center bg-red-700 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                           <p>{{$error}}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>

                </div>
            </div>
        </div>
    @endif

    <div class="card  rounded-sm bg-gray-100 mx-auto md:mt-10 shadow-lg">
        <div class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
            <h1 class="text-teal-600 font-semibold">Edit Course: {{$course->name}}</h1>
        </div>
        <div class="card-body py-5">
            <form method="POST" action="{{ route('courses.update', $course->id) }}" class="mx-auto" >
                @csrf
                @method('PUT')
                <div class="md:flex">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Year
                        </label>
                        <div class="relative">
                        <select id="anio"  onchange="setCode()" name="year" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option disabled selected value> -- select a year -- </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                      Division
                    </label>
                    <div class="relative">
                      <select id="division" onchange="setCode()"  id="" name="division"  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                      </select>
                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </div>
                    </div>
                </div>
                </div>

                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Course
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $course->name) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                    </div>

                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Code
                        </label>
                        <input id="code" type="text"  name="code" value="{{ old('code', $course->code) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                    </div>


                </div>


                @error('name')
                    <span class="flex my-5 justify-center italic text-red-600  text-sm" role="alert">
                            {{$message}}
                    </span>
                @enderror

                <button type="submit" class="w-8/12 mb-5 font-semibold md:w-5/12 py-2 flex mx-auto  justify-center bg-teal-600 text-gray-200 ">Save</button>

            </form>
        </div>
    </div>
</div>

@push('js')
    <script>
    function setCode(){
        let a = ["Cero","Pimero", "Segundo", "Tercero", "Cuarto","Quinto"];
        let y = new Date();
        let n = y.getFullYear();

        let anio = document.getElementById('anio')
        let nombre = document.getElementById('name')

        let division = document.getElementById('division')
        let c = document.getElementById('code')
        let code = anio.value+division.value + n
        nombre.value = a[anio.value] +' '+division.value
        c.value = code
        console.log(code)
    }
</script>
@endpush
@endsection

