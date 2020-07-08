@extends('layouts.dashboard')

@section('content')

    <div class="flex flex-wrap">
        <div class="w-full mx-2 text-white card bg-gradient-green rounded-sm font-montserrat md:w-5/12 flex p-5 justify-between mt-5 items-center">
                <div>
                    <svg aria-hidden="true" data-prefix="fas" data-icon="clipboard-list"
                        class="h-12 w-12 svg-inline--fa fa-clipboard-list fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"/></svg>
                </div>
            <div class="text-right">
                <h1 class="text-sm">Tareas Pendientes</h1>
                <a href="{{route('student.penddings')}}">
                        <span>{{$jobs->count()}}</span>
                </a>
            </div>

        </div>

        <div class="w-full mx-2 text-white card bg-gradient-red rounded-sm font-montserrat md:w-5/12 flex p-5 justify-between mt-5 items-center">

            <div>
                <svg aria-hidden="true" data-prefix="fas" data-icon="briefcase"
                    class="h-12 w-12 svg-inline--fa fa-briefcase fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></svg>
            </div>
            <div class="text-right">

                <h1 class="text-sm">Entregas</h1>

            <a href="{{route('student.deliveries')}}">
                    <span>{{$deliveries->count()}}</span>
                </a>

            </div>

        </div>
    </div>

    <div id="accordion">
        <h1 class="mb-4">
            tailwind collapsible
        </h1>
        <section class="shadow">
            @foreach($subjects as $subject)

            <article class="border-b">
                <div class="border-l-2 border-transparent">
                    <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none">
                        <span class="text-grey-darkest font-thin text-xl">
                            {{$subject->name}}
                        </span>
                        <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center">
                            <!-- icon by feathericons.com -->
                            <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="6 9 12 15 18 9">
                                </polyline>
                            </svg>
                        </div>
                    </header>
                    <div>
                        <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                            <ul class="pl-4">
                                @foreach ($subject->posts as $post)
                                    <li class="pb-2">
                                    <span>Autor {{$post->user->name}}</span>
                                    {{$post->title}}
                                    @foreach ($post->annotations as $annotation)
                                       <div>
                                        <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                                            <ul class="pl-4">
                                                <li class="pb-2">
                                                <h2>Comment: {{$annotation->annotation}} </h2>
                                                    <span>by{{$annotation->user->name}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    <form action="{{route('annotations.store')}}" method="POST">
                                        @csrf
                                        <input type="text" name="post_id" value="{{$post->id}}" hidden>
                                        <input type="text" name="subject_id" value="{{$subject->id}}" hidden>
                                        <div
                                            class="w-8/12 mx-5 border border-gray-600 bg-white h-8 rounded-full px-5 py-1 content-center flex items-center">
                                            <input name="annotation" type="text" class="bg-transparent focus:outline-none w-full  text-sm   ">
                                            <button type="submit" class="text-teal-600 font-semibold">Comment</button>
                                        </div>
                                    </form>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            {{-- <article class="border-b">
                <div class="border-l-2 bg-grey-lightest border-indigo">
                    <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none">
                        <span class="text-indigo font-thin text-xl">
                            Lorem ipsum dolor sit amet
                        </span>
                        <div class="rounded-full border border border-indigo w-7 h-7 flex items-center justify-center bg-indigo">
                            <!-- icon by feathericons.com -->
                            <svg aria-hidden="true" data-reactid="281" fill="none" height="24" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="18 15 12 9 6 15">
                                </polyline>
                            </svg>
                        </div>
                    </header>
                    <div>
                        <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                            <ul class="pl-4">
                                <li class="pb-2">
                                    consectetur adipiscing elit
                                </li>
                                <li class="pb-2">
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                </li>
                                <li class="pb-2">
                                    Viverra orci sagittis eu volutpat odio facilisis mauris
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article> --}}


        </section>
    </div>


@endsection
