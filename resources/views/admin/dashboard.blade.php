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
<button class="btn btn-primary sm:text-black">Primary</button>
<button class="btn btn-secondary">Secondary</button>


<h1 class="mt-8">Form</h1>
<div class="shadow-xl p-10 bg-white max-w-xl">
    <h1 class="text-4xl font-black mb-4">Login</h1>
        <div class="mb-4 relative">
            <input class="input border border-gray-400 appearance-none w-full px-3 py-3 pt-5 pb-2 focus focus:border-primary-400 focus:outline-none active:outline-none active:border-indigo-600" id="email" type="text" autofocus>
            <label for="email" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Email Address</label>
        </div>

        <div class="mb-4 relative">
            <input class="input bg-gray-200 appearance-none border border-gray-200 leading-tight w-full px-3 py-3 pt-5 pb-2 focus focus:bg-white focus:border-primary-400 focus:outline-none active:outline-none active:border-indigo-600" id="password" type="text" autofocus>
            <label for="password" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Name</label>
        </div>

        <div class="mb-4 relative">
            <input class="input bg-gray-200 appearance-none border-b-2 border-gray-200 leading-tight w-full px-3 py-3 pt-5 pb-2 focus focus:bg-white focus:border-primary-200 focus:outline-none active:outline-none active:border-indigo-600" id="password" type="password" autofocus>
            <label for="password" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Password</label>
        </div>

        {{-- posible queda --}}
        <div class="mb-4 relative">
            <input class="input bg-gray-200 appearance-none border-b-2 border-gray-400 leading-tight w-full px-3 py-3 pt-5 pb-2 focus focus:bg-white focus:border-primary-200 focus:outline-none active:outline-none active:border-indigo-600" id="password" type="text" autofocus>
            <label for="text" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Name</label>
        </div>

        <div class="mb-4 relative">
            <input class="input input-control" id="" type="text">
            <label for="text" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Name2</label>
        </div>
        


</div>


{{-- form card --}}
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-6">
      <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
          First Name
        </label>
        <input class="input input-control" id="grid-first-name" type="text" placeholder="Jane">
        <p class="text-red text-xs italic">Please fill out this field.</p>
      </div>
      <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
          Last Name
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Doe">
      </div>
    </div>
    <div class="-mx-3 md:flex mb-6">
      <div class="md:w-full px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
          Password
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="password" placeholder="******************">
        <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
      </div>
    </div>
    <div class="-mx-3 md:flex mb-2">
      <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
          City
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-city" type="text" placeholder="Albuquerque">
      </div>
      <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
          State
        </label>
        <div class="relative">
          <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
            <option>New Mexico</option>
            <option>Missouri</option>
            <option>Texas</option>
          </select>
          <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
          Zip
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-zip" type="text" placeholder="90210">
      </div>
    </div>
  </div>
  



@endsection
