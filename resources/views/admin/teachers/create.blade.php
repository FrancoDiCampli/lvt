@extends('layouts.dashboard')

@section('content')
<div class="container font-montserrat text-sm ">
    <div class="card  rounded-sm bg-gray-100 mx-auto md:mt-10 shadow-lg">
        <div
            class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
            <h1 class="text-teal-600 font-semibold">{{$subject->name}}</h1>
        </div>
        <div class="card-body py-5">
            <form method="POST" action="{{route('teachers.store')}}" enctype="multipart/form-data" class="mx-auto">
                @csrf

                <input hidden type="text" name="subject" id="" value="{{$subject->id}}">

                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-1/2 px-3">
                        <div class="mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Title
                            </label>
                            <input type="text" id="title" name="title" value=""
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Title">
                        </div>
                        <div class="flex-wrap items-center mb-2">
                            <div>
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Start
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 hover:text-teal-500"
                                    type="date" name="start">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-wrap items-center">
                            <div>
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    End
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 hover:text-teal-500"
                                    type="date" name="end">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Description
                        </label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" placeholder="description"></textarea>
                    </div>
                </div>

                <div class="flex flex-wrap my-5 items-center">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-state">
                            File
                        </label>
                        <div class="relative">
                            <div class="overflow-hidden relative w-64 mt-4 mb-4">
                                <div class="flex items-center justify-center bg-grey-lighter">
                                    <label
                                        class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-teal-500">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        <span class="mt-2 text-base leading-normal" id="selected">Select a file</span>
                                        <input type='file' class="hidden" name="file" id="fileName"
                                            onchange="setName()" />
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <button type="submit"
                            class="w-8/12 mb-5 font-semibold md:w-5/12 py-2 flex mx-auto  justify-center bg-teal-600 text-gray-200 hover:bg-teal-400">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function setName(){
            let fileName = document.getElementById('fileName')
            var cad = fileName.value
            cad = cad.split('\\')
            let selected = document.getElementById('selected')
            selected.innerHTML = cad[2]
            console.log(cad[2])
        }
</script>
@endpush
