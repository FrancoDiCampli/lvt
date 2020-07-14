@extends('layouts.app')

@section('content')


<!-- Container -->
<div class="mx-auto">
    <div class="flex justify-center">
        <!-- Row -->
        <div class="w-full xl:w-4/4 lg:w-12/12 flex">
            <!-- Col -->
            <div
                class="w-full h-auto bg-gray-300 hidden lg:block md:block lg:w-1/2 bg-cover rounded-l-md"
                {{-- style="background-image: url('https://source.unsplash.com/K4mSJ7kc0As/600x800')" --}}

            ><img src="{{asset('img/login.png')}}"  class="w-auto h-auto" alt=""></div>
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white p-5 rounded-sm lg:rounded-l-none">
                <div class="block lg:hidden md:hidden mx-auto justify-center flex">
                <a href="">
                      <img src="{{asset('img/sm-icon-svg.svg')}}" class="w-40 h-40" alt="">

                </a>

            </div>
                <h3 class="pt-12 lg:pt-32 text-2xl text-center text-primary-400 font-montserrat font-bold">Welcome Schoolmate!</h3>
                <form method="POST" action="{{ route('login') }}" class="px-8 md:px-12 lg:px-12 xl:px-24 pt-6 pb-8 mb-4 bg-white rounded">
                    @csrf
                    <div class="mb-4 relative">
                        <input class="input border-b border-gray-400 appearance-none w-full px-3 py-3 pt-5 pb-2 focus focus:border-primary-400 focus:outline-none active:outline-none active:border-indigo-600" placeholder="Username" id="email" type="email" name="email" required>

                    </div>
                    <div class="mb-4 relative">
                        <input class="input border-b border-gray-400 appearance-none w-full px-3 py-3 pt-5 pb-2 focus focus:border-primary-400 focus:outline-none active:outline-none active:border-indigo-600" placeholder="Password" id="password" type="password" name="password" required>

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

                    <div class="mb-4">
                        <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="text-sm" for="remember">
                            Remember Me
                        </label>
                    </div>
                    <div class="mb-6 text-center">
                        <button
                            class="btn btn-primary w-full"
                            type="submit"
                        >
                            Sign In
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />

                    <div class="text-center">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                         @endif
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
