@extends('layouts.app')

@section('content')
    <div class="container font-montserrat">
        <div class="card w-11/12 md:w-5/12 rounded-sm bg-gray-100 mx-auto mt-10 shadow-lg">
            <div class="card-title bg-white p-0 w-full p-5 border-b">
               <h1 class="text-center font-semibold text-teal-600">Welcome</h1>
            </div>
            <div class="card-body py-5">
                <form method="POST" action="{{ route('login') }}" class="mx-auto" >
                    @csrf
                    <div class="flex items-center border w-8/12 mx-auto h-8 bg-white justify-between">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="user"
                        class="p-1 text-gray-600 mx-auto h-5 w-5  svg-inline--fa fa-user fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                        <input type="email"  name="email" required  placeholder="email" class="w-10/12 bg-white focus:outline-none ">

                    </div>

                    <div class="flex items-center border w-8/12 my-5 mx-auto h-8 bg-white justify-between">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="key"
                            class="p-1  text-gray-600 mx-auto h-5 w-5  svg-inline--fa fa-key fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 176.001C512 273.203 433.202 352 336 352c-11.22 0-22.19-1.062-32.827-3.069l-24.012 27.014A23.999 23.999 0 01261.223 384H224v40c0 13.255-10.745 24-24 24h-40v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-78.059c0-6.365 2.529-12.47 7.029-16.971l161.802-161.802C163.108 213.814 160 195.271 160 176 160 78.798 238.797.001 335.999 0 433.488-.001 512 78.511 512 176.001zM336 128c0 26.51 21.49 48 48 48s48-21.49 48-48-21.49-48-48-48-48 21.49-48 48z"/></svg>
                            <input type="password" name="password" placeholder="password" class="w-10/12 bg-white focus:outline-none">

                        </div>
                        @error('password')
                        <span class="flex my-5 justify-center italic text-red-600  text-sm" role="alert">
                                {{$message}}
                        </span>
                    @enderror

                    @error('email')
                        <span class="flex my-5 justify-center italic text-red-600  text-sm" role="alert">
                                {{$message}}
                        </span>
                    @enderror

                    <button type="submit" class="mb-5 font-semibold w-8/12 flex mx-auto text-center justify-center bg-teal-600 text-gray-200 px-5 py-2">Login</button>

                </form>


            </div>

        </div>

    </div>
@endsection
