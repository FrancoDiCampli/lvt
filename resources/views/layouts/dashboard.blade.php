<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <style>
        .tooltip .tooltip-text {
        visibility: hidden;

        }
        .tooltip:hover .tooltip-text {
        visibility: visible;
        }

    </style>
</head>

<body class="bg-gray-100 font-montserrat" id="all">
    <div class="loader-container">
        <div class="loader"></div>
        <div class="loader2"></div>
      </div>

    <main id="app" class="">
        <div class="top-navbar w-full mx-auto flex items-center  bg-gray-200 p-3 border-b border-gray-400">
                <a href="">
                      <img src="{{asset('img/sm-sidebar-png.png')}}" class="md:w-16 md:h-16 w-12 h-12  pl-0 md:ml-10 ml-6 " alt="">
                </a>

            <h1 class="text-bluedark-400 font-rubik text-2xl ml-12 mr-10 w-auto hidden md:block">Félix<span class="font-semibold">Frías</span></h1>

            <div class=" w-full flex relative items-center text-right float-right justify-end ">
                <div class="p-2 flex absolute">
                    <button onclick="notification()" class="rounded-full hover:bg-gray-400 focus:shadow-md focus:outline-none flex md:mr-4" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 55" class="w-6 h-6 m-2 "><path d="M51.376 45.291C46.716 40.66 44.354 35.179 44.354 29v-8.994c.043-6.857-4.568-11.405-8.53-13.216-1.117-.51-2.294-.888-3.494-1.178V5c0-2.757-2.243-5-5-5s-5 2.243-5 5v.706c-1.079.283-2.139.629-3.146 1.093-4.379 2.018-8.815 6.882-8.855 13.201v9c0 6.388-2.256 11.869-6.705 16.291a1.002 1.002 0 00.535 1.695l9.491 1.639c1.79.309 3.415.556 4.944.758C20.339 52.804 23.766 55 27.512 55c3.747 0 7.175-2.198 8.919-5.621 1.522-.201 3.139-.447 4.919-.755l9.49-1.639a1 1 0 00.536-1.694zM24.329 5c0-1.654 1.346-3 3-3s3 1.346 3 3v.193a20.176 20.176 0 00-6 .05V5zm-8 16h-.006a1.001 1.001 0 01-.994-1.006c.03-4.682 3.752-7.643 5.948-8.654 3.849-1.775 8.594-1.772 12.469-.002a1 1 0 11-.832 1.818c-3.353-1.533-7.469-1.537-10.799 0-1.767.814-4.762 3.173-4.785 6.85a1 1 0 01-1.001.994zm17.606 28.678C32.416 51.739 30.047 53 27.512 53c-2.534 0-4.902-1.26-6.421-3.32h.001c.396.041.78.073 1.164.106.183.016.371.035.552.05.14.011.275.018.414.028 2.906.212 5.582.212 8.486.005.167-.012.33-.021.499-.034.218-.017.444-.04.665-.059.339-.03.676-.058 1.025-.094l.038-.004z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#0E2A3F"/></svg>
                        <p class="absolute bg-red-600 justify-center rounded-full px-1 mr-4 text-white text-xs">5</p>
                    </button>

                    {{-- notificaciones --}}
                    <div id="menu-notification"  class="hidden border bg-white absolute p-2 mt-12 text-sm md:w-64 w-56 mx-auto right-0 shadow-lg z-50
                    rounded-sm text-left md:mr-24 mr-6">
                        <a href="" class="block py-2 w-full">Se agregó una tarea..</a>
                        <a href="" class="block py-2">Has recibido una devolución</a>
                        <a href="" class="block py-2">Has recibido una devolución</a>
                    </div>
                    {{-- <h2 class="text-sm font-medium text-gray-800 m-2">{{auth()->user()->name}} </h2> --}}
                    <p class="tooltip z-50">
                        <img  class="w-10 h-10 rounded-full object-cover mr-4 shadow hidden md:block" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
                        <span class="tooltip-text hidden md:block bg-gray-600 m-2 -mx-24 absolute text-center text-xs p-1 text-white rounded-md shadow-md">{{auth()->user()->name}}</span>
                    </p>

                </div>
            </div>


            <div class="relative md:w-0 w-2/12 text-right">
                <div id="dropdown"
                    class="hidden transition-all delay-100 bg-white absolute right-0 text-sm text-left w-8/12 p-2 rounded-sm">
                    <a href="" class="block ">Perfil</a>
                    <a href="" class="block ">Logout</a>
                </div>
                <button onclick="setRes()" class="md:hidden text-gray-700 mt-2 ml-2 mr-3">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="bars"
                        class="h-5 w-5 svg-inline--fa fa-bars fa-w-14" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path id="marker" class="hidden" fill="currentColor"
                            d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" />
                        <path id="bar" fill="currentColor"
                            d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
                    </svg>

                </button>
            </div>
        </div>

        <div class="mx-full flex min-h-screen  relative">

            <div id="sidebar" class="md:block bg-gray-200 shadow-lg w-0 md:w-3/12 transition-all delay-75  m-0 p-0 mx-auto text-left">
                <button onclick="setRes()" class="md:hidden text-gray-700 mt-5 ml-5">
                    {{-- <svg aria-hidden="true" data-prefix="fas" data-icon="bars"
                        class="h-5 w-5 svg-inline--fa fa-bars fa-w-14"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path id="marker" class="hidden" fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/>
                        <path id="bar" fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/>
                    </svg> --}}

                </button>
                <div class="md:pt-10 pb-10 px-6 pl-8">
                    <a href="{{route('home')}}" class="flex justify-center md:justify-start text-gray-600 mt-1 hover:text-gray-700 focus:bg-gray-300 rounded-md p-2">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="tachometer-alt"
                            class="h-5 w-5  svg-inline--fa fa-tachometer-alt fa-w-18" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M288 32C128.94 32 0 160.94 0 320c0 52.8 14.25 102.26 39.06 144.8 5.61 9.62 16.3 15.2 27.44 15.2h443c11.14 0 21.83-5.58 27.44-15.2C561.75 422.26 576 372.8 576 320c0-159.06-128.94-288-288-288zm0 64c14.71 0 26.58 10.13 30.32 23.65-1.11 2.26-2.64 4.23-3.45 6.67l-9.22 27.67c-5.13 3.49-10.97 6.01-17.64 6.01-17.67 0-32-14.33-32-32S270.33 96 288 96zM96 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm48-160c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm246.77-72.41l-61.33 184C343.13 347.33 352 364.54 352 384c0 11.72-3.38 22.55-8.88 32H232.88c-5.5-9.45-8.88-20.28-8.88-32 0-33.94 26.5-61.43 59.9-63.59l61.34-184.01c4.17-12.56 17.73-19.45 30.36-15.17 12.57 4.19 19.35 17.79 15.17 30.36zm14.66 57.2l15.52-46.55c3.47-1.29 7.13-2.23 11.05-2.23 17.67 0 32 14.33 32 32s-14.33 32-32 32c-11.38-.01-20.89-6.28-26.57-15.22zM480 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z" />
                        </svg>
                        <span class="mx-2 hidden md:block">Dashboard</span>
                    </a>

                    <a href="{{route('courses.index')}}"
                        class="flex md:justify-start justify-center text-gray-600 mt-1 hover:text-gray-700 focus:bg-gray-300 rounded-md p-2">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="graduation-cap"
                            class="h-5 w-5  svg-inline--fa fa-graduation-cap fa-w-20" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512">
                            <path fill="currentColor"
                                d="M622.34 153.2L343.4 67.5c-15.2-4.67-31.6-4.67-46.79 0L17.66 153.2c-23.54 7.23-23.54 38.36 0 45.59l48.63 14.94c-10.67 13.19-17.23 29.28-17.88 46.9C38.78 266.15 32 276.11 32 288c0 10.78 5.68 19.85 13.86 25.65L20.33 428.53C18.11 438.52 25.71 448 35.94 448h56.11c10.24 0 17.84-9.48 15.62-19.47L82.14 313.65C90.32 307.85 96 298.78 96 288c0-11.57-6.47-21.25-15.66-26.87.76-15.02 8.44-28.3 20.69-36.72L296.6 284.5c9.06 2.78 26.44 6.25 46.79 0l278.95-85.7c23.55-7.24 23.55-38.36 0-45.6zM352.79 315.09c-28.53 8.76-52.84 3.92-65.59 0l-145.02-44.55L128 384c0 35.35 85.96 64 192 64s192-28.65 192-64l-14.18-113.47-145.03 44.56z" />
                        </svg>
                        <span class="mx-2 hidden md:block">Courses</span>
                    </a>


                    <a href="" class="flex md:justify-start justify-center text-gray-600 mt-1 hover:text-gray-700 focus:bg-gray-300 rounded-md p-2">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="tasks"
                            class="h-5 w-5 svg-inline--fa fa-tasks fa-w-16" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M139.61 35.5a12 12 0 00-17 0L58.93 98.81l-22.7-22.12a12 12 0 00-17 0L3.53 92.41a12 12 0 000 17l47.59 47.4a12.78 12.78 0 0017.61 0l15.59-15.62L156.52 69a12.09 12.09 0 00.09-17zm0 159.19a12 12 0 00-17 0l-63.68 63.72-22.7-22.1a12 12 0 00-17 0L3.53 252a12 12 0 000 17L51 316.5a12.77 12.77 0 0017.6 0l15.7-15.69 72.2-72.22a12 12 0 00.09-16.9zM64 368c-26.49 0-48.59 21.5-48.59 48S37.53 464 64 464a48 48 0 000-96zm432 16H208a16 16 0 00-16 16v32a16 16 0 0016 16h288a16 16 0 0016-16v-32a16 16 0 00-16-16zm0-320H208a16 16 0 00-16 16v32a16 16 0 0016 16h288a16 16 0 0016-16V80a16 16 0 00-16-16zm0 160H208a16 16 0 00-16 16v32a16 16 0 0016 16h288a16 16 0 0016-16v-32a16 16 0 00-16-16z" />
                        </svg>
                        <span class="mx-2 hidden md:block">Deliveries</span>
                    </a>
                    <a href="" class="flex md:justify-start justify-center text-gray-600 mt-1 hover:text-gray-700 focus:bg-gray-300 rounded-md p-2">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="clipboard-list"
                            class="h-5 w-5 svg-inline--fa fa-clipboard-list fa-w-12" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <path fill="currentColor"
                                d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z" />
                        </svg>
                        <span class="mx-2 hidden md:block">Jobs</span>
                        <a href="{{route('enrollments.index')}}"
                            class="flex md:justify-start justify-center text-gray-600 mt-1 hover:text-gray-700 focus:bg-gray-300 rounded-md p-2">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="chart-pie"
                                class="h-5 w-5  svg-inline--fa fa-chart-pie fa-w-17" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 544 512">
                                <path fill="currentColor"
                                    d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z" />
                            </svg>
                            <span class="mx-2 hidden md:block">Enrollments</span>
                        </a>
                        <a href="{{route('subjects.index')}}"
                            class="flex md:justify-start justify-center text-gray-600 mt-1 hover:text-gray-700 focus:bg-gray-300 rounded-md p-2">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="tags"
                                class="h-5 w-5  svg-inline--fa fa-tags fa-w-20" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M497.941 225.941L286.059 14.059A48 48 0 00252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0014.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0133.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z" />
                            </svg>
                            <span class="mx-2 hidden md:block">Subjects</span>
                        </a>

                        <a onclick="showMenu()" href="#"
                            class="focus:outline-none flex md:justify-start justify-center text-gray-600 mt-1 hover:text-gray-700 focus:bg-gray-300 rounded-md p-2">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="user-graduate"
                                class="h-5 w-5 svg-inline--fa fa-user-graduate fa-w-14"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor"
                                    d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z" />
                            </svg>
                            <span class="mx-2 hidden md:block">Users</span>

                        </a>

                        {{-- <ul class="px-5 hidden" id="users-admin">
                            <li><a href="">Profile</a></li>
                            <li><a href="">Admin Roles</a></li>
                            <li><a href="">Admin Users</a></li>
                            <li><a href="{{route('import')}}">Import Data</a></li>
                        </ul> --}}
                        <div class="hidden text-left md:ml-0 ml-20 pl-6 md:pl-8 text-gray-600" id="users-admin">
                            <div class="py-1 hover:text-gray-700 ">
                                <a href="">Profile</a>
                            </div>
                            <div class="py-1 hover:text-gray-700 ">
                                <a href="">Admin Users</a>
                            </div>
                            <div class="py-1 hover:text-gray-700 ">
                                <a href="{{route('import')}}">Import Data</a>
                            </div>
                        </div>

                        {{-- logout --}}
                        <a class="flex md:justify-start justify-center text-gray-600 mt-1 hover:text-gray-700 focus:bg-gray-300 rounded-md p-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="tags"
                                class="h-5 w-5  svg-inline--fa fa-tags fa-w-20" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M497.941 225.941L286.059 14.059A48 48 0 00252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0014.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0133.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z" />
                            </svg>
                            <span class="mx-2 hidden md:block">Cerrar Sesión</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        {{-- end logout --}}
                </div>
            </div>


            <div class="main-content md:w-10/12 w-full mx-10">

                {{-- Mensaje de sesion --}}
                <div class="container">
                    @if (session('messages'))
                        <!--Toast-->
                        <div class="alert-toast fixed bottom-auto md:top-0 right-0 m-8 w-5/6 md:w-full max-w-sm items-center">
                            <input type="checkbox" class="hidden" id="footertoast">

                            <label class="close cursor-pointer flex items-start justify-between w-full pl-3 pt-3 bg-greenschool-200 md:h-auto h-auto rounded shadow-lg text-white" title="close" for="footertoast">
                                {{ session('messages') }}

                                <svg class="fill-current text-white mr-4 mt-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                            </label>
                        </div>

                    @endif
                </div>

                <div class="container">
                    @if (session('errores'))
                        <!--Toast-->
                        <div class="alert-toast fixed bottom-auto md:top-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
                            <input type="checkbox" class="hidden" id="footertoast">

                            <label class="close cursor-pointer flex items-start justify-between w-full pl-3 pt-3 bg-red-500 sm:h-20 md:h-auto h-auto rounded shadow-lg text-white" title="close" for="footertoast">
                                {{ session('errores') }}

                                <svg class="fill-current text-white mr-4 mt-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                            </label>
                        </div>

                    @endif
                </div>



                {{-- <div class="breadcrumbs w-auto p-1 mt-10 text-sm">
                    @foreach (request()->segments() as $segment)
                    @if ($loop->first)
                    <a href="/{{auth()->user()->roles()->first()->name}}">
                        <span class="text-gray-500">Inicio</span>
                    </a>
                    @endif

                    <a href="{{url()->previous()}}">
                        <b>></b> <span class="text-gray-500">{{$segment}}</span>
                    </a>

                    @if ($loop->last)
                    <a href="{{url()->current()}}">
                        <b>></b> <span class="text-gray-500">{{$segment}}</span>
                    </a>
                    @endif

                    @endforeach
                </div> --}}

                @yield('content')

            </div>

        </div>
    </main>

    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    @stack('js')
    <script>
        let sidebar = document.getElementById('sidebar')
        let bar = document.getElementById('bar')
        let marker = document.getElementById('marker')
        function setRes(){
            sidebar.classList.toggle("sidebar-expanded");
            bar.classList.toggle("hidden");
            marker.classList.toggle("hidden");

        }

        let dd = document.getElementById('users-admin')
        function showMenu(){
            dd.classList.toggle("hidden");
        }

        // let fm = document.getElementById('float-menu')
        // function toogleFm(){
        //         fm.classList.toggle('hidden')

        // }

        let nt = document.getElementById('menu-notification')
        function notification(){
            nt.classList.toggle('hidden')

        }

    // let main = document.getElementById('app')
    // main.addEventListener('click',function(e){
    //     nt.classList.toggle("hidden");
    // })

    </script>
</body>

</html>
