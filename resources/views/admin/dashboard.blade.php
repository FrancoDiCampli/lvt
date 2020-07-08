@extends('layouts.dashboard')

@section('content')

{{-- <button class="btn btn-teal">prueba</button> --}}
    {{-- <example-component></example-component> --}}
<h1 class="text-3xl pb-2">Buttons</h1>

<button class="btn bg-primary-400 focus:bg-primary-100 focus:outline-none hover:bg-primary-500 mb-5 flex text-center justify-center text-white px-6 py-2 shadow-lg">Primary</button>

<button class="btn bg-secondary-400 hover:bg-secondary-500 focus:bg-secondary-100 focus:outline-none mb-5 flex text-center justify-center text-white px-6 py-2 shadow-lg">Secondary</button>


<button class="btn bg-blue-300 hover:bg-blue-400 focus:outline-none focus:bg-blue-100 mb-5 flex text-center justify-center text-white px-6 py-2 shadow-lg">Blue</button>

<button class="btn bg-bluedark-500 hover:bg-bluedark-400 focus:outline-none focus:bg-bluedark-100 mb-5 flex text-center justify-center text-white px-6 py-2 shadow-lg">Blue dark</button>

<button class="btn bg-transparent hover:bg-bluedark-500 hover:text-white border border-bluedark-500 mb-5 flex text-center justify-center text-blue-dark px-6 py-2 shadow-lg focus:bg-transparent focus:outline-none focus:text-blue-300 focus:border-blue-300">Default</button>


<h1>Button en clases</h1>
<button class="btn btn-primary">Primary</button>
<button class="btn btn-secondary">Secondary</button>
<button class="btn btn-blue">Blue</button>
<button class="btn btn-bluedark">Blue Dark</button>
<button class="btn btn-default">Default</button>



@endsection
