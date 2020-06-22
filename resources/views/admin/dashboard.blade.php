@extends('layouts.dashboard')

@section('content')

    <div class="container w-4/6 mx-auto flex p-5 ">

        <div class="sidebar  w-3/12">
            <h1 class="text-teal-500 font-rubik text-2xl my-5">School<span class="font-semibold">Mate</span></h1>

            <div class="my-10 font-montserrat ">
                <a href="" class="flex items-center text-gray-600 mt-5">
  <svg aria-hidden="true" data-prefix="fas" data-icon="user"
                        class="h-4 w-4 text-teal-500 svg-inline--fa fa-user fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                    <span class="mx-2">Account</span>
                </a>

                <div class="flex items-center text-gray-600 mt-5">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="briefcase" class="h-4 w-4 svg-inline--fa fa-briefcase fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></svg>
                    <span class="mx-2">Wallet</span>
                </div>
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
            <div class="mt-5 text-right text-blue-500">
                <a href="" class="">admin@mail.com</a> |
                <a href="">Logout</a>
            </div>

            <div class="breadcum mt-10 border-b text-sm ">
                <span  class="text-gray-700">Enrollments>Course>Subject</span>
            </div>

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


@endsection
