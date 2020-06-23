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

            <div class="sidebar  w-3/12  ">
                <h1 class="text-teal-500 font-rubik text-2xl my-5 border-b border-gray-400">School<span class="font-semibold">Mate</span></h1>

                <div class="my-12 font-montserrat border-r border-gray-400 mr-5 h-screen">
                    <a href="{{route('home')}}" class="flex items-center text-gray-600 mt-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="tachometer-alt" class="h-4 w-4 svg-inline--fa fa-tachometer-alt fa-w-18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M288 32C128.94 32 0 160.94 0 320c0 52.8 14.25 102.26 39.06 144.8 5.61 9.62 16.3 15.2 27.44 15.2h443c11.14 0 21.83-5.58 27.44-15.2C561.75 422.26 576 372.8 576 320c0-159.06-128.94-288-288-288zm0 64c14.71 0 26.58 10.13 30.32 23.65-1.11 2.26-2.64 4.23-3.45 6.67l-9.22 27.67c-5.13 3.49-10.97 6.01-17.64 6.01-17.67 0-32-14.33-32-32S270.33 96 288 96zM96 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm48-160c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm246.77-72.41l-61.33 184C343.13 347.33 352 364.54 352 384c0 11.72-3.38 22.55-8.88 32H232.88c-5.5-9.45-8.88-20.28-8.88-32 0-33.94 26.5-61.43 59.9-63.59l61.34-184.01c4.17-12.56 17.73-19.45 30.36-15.17 12.57 4.19 19.35 17.79 15.17 30.36zm14.66 57.2l15.52-46.55c3.47-1.29 7.13-2.23 11.05-2.23 17.67 0 32 14.33 32 32s-14.33 32-32 32c-11.38-.01-20.89-6.28-26.57-15.22zM480 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>
                        <span class="mx-2">Dashboard</span>
                    </a>

                    <a href="{{route('courses.index')}}" class="flex items-center text-gray-600 mt-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="graduation-cap" class="h-4 w-4 svg-inline--fa fa-graduation-cap fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M622.34 153.2L343.4 67.5c-15.2-4.67-31.6-4.67-46.79 0L17.66 153.2c-23.54 7.23-23.54 38.36 0 45.59l48.63 14.94c-10.67 13.19-17.23 29.28-17.88 46.9C38.78 266.15 32 276.11 32 288c0 10.78 5.68 19.85 13.86 25.65L20.33 428.53C18.11 438.52 25.71 448 35.94 448h56.11c10.24 0 17.84-9.48 15.62-19.47L82.14 313.65C90.32 307.85 96 298.78 96 288c0-11.57-6.47-21.25-15.66-26.87.76-15.02 8.44-28.3 20.69-36.72L296.6 284.5c9.06 2.78 26.44 6.25 46.79 0l278.95-85.7c23.55-7.24 23.55-38.36 0-45.6zM352.79 315.09c-28.53 8.76-52.84 3.92-65.59 0l-145.02-44.55L128 384c0 35.35 85.96 64 192 64s192-28.65 192-64l-14.18-113.47-145.03 44.56z"/></svg>
                        <span class="mx-2">Courses</span>
                    </a>


                    <div class="flex items-center text-gray-600 mt-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="chart-pie"
                            class="h-4 w-4 svg-inline--fa fa-chart-pie fa-w-17" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512"><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"/></svg>
                        <span class="mx-2">Resume</span>
                    </div>
                    <div class="flex items-center text-gray-600 mt-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="tags" class="h-4 w-4 svg-inline--fa fa-tags fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M497.941 225.941L286.059 14.059A48 48 0 00252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0014.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0133.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z"/></svg>
                        <span class="mx-2">Subjects</span>
                    </div>
                </div>
            </div>


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

                {{-- @yield('content') --}}

                <div class="card bg-white rounded-lg font-montserrat">
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
                </div>

            </div>

        </div>
    </main>

<script src="{{asset('js/app.js')}}"></script>
@stack('js')
</body>
</html>
