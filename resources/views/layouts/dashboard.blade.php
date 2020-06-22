<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body class="bg-gray-200">

    <main id="app">
        <div class="container w-4/6 mx-auto flex p-5 ">

           @include('partials.sidebar')

            <div class="main-content  w-9/12">
                <div class="my-8 text-right text-blue-500 border-b border-gray-400">
                    <a href="" class="">admin@mail.com</a> |
                    <span>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                    </span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                    </form>
                </div>

                <div class="breadcum mt-10  text-sm ">
                    <span  class="text-gray-700">Enrollments>Course>Subject</span>
                </div>

                @yield('content')

                {{-- <div class="card bg-white rounded-lg font-montserrat">
                    <div class="card-title p-5">
                        Franco Di Campli
                    </div>

                    <div class="card-body flex justify-around">
                        <div class="">
                            <div class="m-2">
                                <span class="font-semibold">User ID</span>
                                <p>franco@mail.com</p>
                            </div>
                            <div class="m-2">
                                <span class="font-semibold">Role</span>
                                <p>admin</p>
                            </div>
                        </div>

                        <div>
                            <div class="m-2">
                                <span class="font-semibold">Created</span>
                                <p>22-07-81</p>
                            </div>
                            <div class="m-2">
                                <span class="font-semibold">State</span>
                                <p>Active</p>
                            </div>
                        </div>

                    </div>
                </div> --}}

            </div>

        </div>
    </main>

<script src="{{asset('js/app.js')}}"></script>
@stack('js')
</body>
</html>
