@extends('layouts.app')

@section('content')
    <div class="container font-montserrat">
        <div class="card w-4/12 rounded-sm bg-gray-100 mx-auto mt-10 shadow-lg">
            <div class="card-title bg-white p-0 w-full p-5 border-b">
               <h1 class="text-center font-semibold text-teal-600">New User</h1>
            </div>
            <div class="card-body py-5">
                <form method="POST" action="{{ route('register') }}" class="mx-auto" >
                    @csrf

                    <div class="flex items-center border w-8/12 mx-auto h-10 bg-white my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="user"
                        class="text-gray-600 mx-auto h-5 w-5 svg-inline--fa fa-user fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                        <input type="text"  name="name" value="{{ old('name') }}"  placeholder="user name" class="bg-transparent focus:outline-none">

                    </div>


                    <div class="flex items-center border w-8/12 mx-auto h-10 bg-white">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="envelope"
                        class="text-gray-600 mx-auto h-5 w-5  svg-inline--fa fa-envelope fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
                        <input type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email" class="bg-transparent focus:outline-none">

                    </div>

                    <div class="flex items-center border w-8/12 my-5 mx-auto h-10 bg-white">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="key"
                            class="text-gray-600 mx-auto h-5 w-5 svg-inline--fa fa-key fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 176.001C512 273.203 433.202 352 336 352c-11.22 0-22.19-1.062-32.827-3.069l-24.012 27.014A23.999 23.999 0 01261.223 384H224v40c0 13.255-10.745 24-24 24h-40v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-78.059c0-6.365 2.529-12.47 7.029-16.971l161.802-161.802C163.108 213.814 160 195.271 160 176 160 78.798 238.797.001 335.999 0 433.488-.001 512 78.511 512 176.001zM336 128c0 26.51 21.49 48 48 48s48-21.49 48-48-21.49-48-48-48-48 21.49-48 48z"/></svg>
                            <input type="password" name="password" placeholder="password" class="bg-transparent focus:outline-none">

                    </div>
                    <div class="flex items-center border w-8/12 my-5 mx-auto h-10 bg-white">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="key"
                            class="text-gray-600 mx-auto h-5 w-5 svg-inline--fa fa-key fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 176.001C512 273.203 433.202 352 336 352c-11.22 0-22.19-1.062-32.827-3.069l-24.012 27.014A23.999 23.999 0 01261.223 384H224v40c0 13.255-10.745 24-24 24h-40v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-78.059c0-6.365 2.529-12.47 7.029-16.971l161.802-161.802C163.108 213.814 160 195.271 160 176 160 78.798 238.797.001 335.999 0 433.488-.001 512 78.511 512 176.001zM336 128c0 26.51 21.49 48 48 48s48-21.49 48-48-21.49-48-48-48-48 21.49-48 48z"/></svg>
                            <input type="password" name="password_confirmation" placeholder="confirm password" class="bg-transparent focus:outline-none">

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


                        <button type="submit" class="mb-5 font-semibold w-8/12 flex mx-auto text-center justify-center bg-teal-600 text-gray-200 px-5 py-2">Register</button>

                </form>


            </div>

        </div>

    </div>
@endsection
