@extends('layouts.dashboard')

@section('content')

<div class="container font-montserrat text-sm ">

    <div class="card  rounded-sm bg-gray-100 mx-auto mt-10 shadow-lg">
        <div class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
            <h1 class="text-teal-600 font-semibold text-lg md:m-0 m-2">Edit Course: {{$course->name}}</h1>
            <a href="{{route('courses.index')}}" class="flex hover:shadow-lg md:m-0 m-2 px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 306 306"><path data-original="#000000" class="active-path" data-old_color="#000000" fill="#A0AEC0" d="M247.35 35.7L211.65 0l-153 153 153 153 35.7-35.7L130.05 153z"/></svg>
              </a>
        </div>
        <div class="card-body py-5">
            <form method="POST" action="{{ route('courses.update', $course->id) }}" class="mx-auto" >
                @csrf
                @method('PUT')
                <div class="md:flex">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Year
                        </label>
                        <div class="relative">
                        <select id="anio"  onchange="setCode()" name="year" class="form-input w-full block" id="grid-state">
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

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                      Division
                    </label>
                    <div class="relative">
                      <select id="division" onchange="setCode()"  id="" name="division"  class="form-input w-full block" id="grid-state">
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
                    <div class="w-full md:w-1/2 px-3 md:mb-0 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Course
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $course->name) }}" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Doe">
                        <span class="flex italic text-red-600  text-sm" role="alert">
                            {{$errors->first('name')}}
                        </span>
                    </div>

                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Code
                        </label>
                        <input id="code" type="text"  name="code" value="{{ old('code', $course->code) }}" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Doe">
                        <span class="flex italic text-red-600  text-sm" role="alert">
                            {{$errors->first('code')}}
                        </span>
                    </div>
                </div>


                <button type="submit" class="flex mx-auto btn btn-primary">Save</button>

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

