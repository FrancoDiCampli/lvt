@extends('layouts.dashboard')

@section('content')

<div class="container font-montserrat text-sm ">
    <div class="card  rounded-sm bg-gray-100 mx-auto md:mt-10 shadow-lg">
        <div class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
           <h1 class="text-teal-600 font-semibold">Post</h1>
        </div>
        <div class="card-body py-5">

            <form method="POST" action="{{ route('posts.store') }}" class="mx-auto" >
                @csrf
                <input type="text" value="{{$subject->id}}" name="subject_id" >
                <div class="mb-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Title
                    </label>
                    <input type="text" id="title" name="title" value=""
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Title">
                </div>

                <div class="mb-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Description
                    </label>
                    <input type="text" id="title" name="description" value=""
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Title">
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Content
                    </label>
                    <textarea name="content" id="description" cols="30" rows="10"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" placeholder="description"></textarea>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <button type="submit"
                        class="w-8/12 mb-5 font-semibold md:w-5/12 py-2 flex mx-auto  justify-center bg-teal-600 text-gray-200 hover:bg-teal-400">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
