@extends('layouts.dashboard')

@section('content')

<div class="container font-montserrat">
    <div class="card  rounded-sm bg-gray-100 mx-auto mt-10 shadow-lg">
        <div class="card-title bg-white p-0 w-full p-5 border-b flex items-center justify-between ">
           <h1 class="text-teal-600 font-semibold">New Course</h1>
           {{-- <a href="" class="bg-teal-600 text-white text-sm p-2 shadow-lg hover:text-gray-700">New Course</a> --}}

        </div>
        <div class="card-body py-5">
            <form method="POST" action="{{ route('courses.store') }}" class="mx-auto" >
                @csrf
                <div class="flex flex-wrap">
                    <div class="flex items-center border w-5/12 mx-auto h-10 bg-white">
                        <select id="anio"  onchange="setCode()" name="year" id="" name="year" class="focus:outline-none">
                            <option disabled selected value> -- select an option -- </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="flex items-center border w-5/12 mx-auto h-10 bg-white">
                        <select  id="division" onchange="setCode()"  id="" name="division"  class="focus:outline-none">
                            <option disabled selected value> -- select an option -- </option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
                <div class="flex my-5">
                    <div class="flex items-center border w-5/12 mx-auto h-10 bg-white">
                        <input type="text" id="name" name="name" value="" class="bg-transparent focus:outline-none">
                    </div>
                    <div class="flex items-center border w-5/12 mx-auto h-10 bg-white">
                        <input id="code" type="text"  name="code" value="" class="bg-transparent focus:outline-none">
                    </div>
                </div>


                @error('name')
                    <span class="flex my-5 justify-center italic text-red-600  text-sm" role="alert">
                            {{$message}}
                    </span>
                @enderror



                <button type="submit" class="mb-5 font-semibold w-8/12 flex mx-auto text-center justify-center bg-teal-600 text-gray-200 px-5 py-2">Save</button>

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
