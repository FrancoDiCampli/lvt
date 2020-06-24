@extends('layouts.dashboard')

@section('content')

    <div class="flex">
        <div class="mx-2 text-white card bg-gradient-green rounded-sm font-montserrat w-5/12 flex p-5 justify-between mt-5 items-center">
                <div>
                    <svg aria-hidden="true" data-prefix="fas" data-icon="clipboard-list"
                        class="h-12 w-12 svg-inline--fa fa-clipboard-list fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"/></svg>
                </div>
            <div>
                <h1 class="text-sm">Tareas Pendientes</h1>
                <a href="{{route('student.penddings')}}">
                        <span>{{$jobs->count()}}</span>
                </a>
            </div>

        </div>

        <div class="mx-2 text-white card bg-gradient-red rounded-sm font-montserrat w-5/12 flex p-5 justify-between mt-5 items-center">

            <div>
                <svg aria-hidden="true" data-prefix="fas" data-icon="briefcase"
                    class="h-12 w-12 svg-inline--fa fa-briefcase fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></svg>
            </div>
            <div>

                <h1 class="text-sm">Entregas</h1>

                <a href="">
                    <span>{{$deliveries->count()}}</span>
                </a>

            </div>

        </div>
    </div>


@endsection
