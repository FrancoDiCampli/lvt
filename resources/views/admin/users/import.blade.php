@extends('layouts.dashboard')

@section('content')
    <div class="container font-montserrat">
        <div class="card w-11/12 md:w-8/12 rounded-sm bg-gray-100 mx-auto mt-10 shadow-lg">
            <div class="card-title bg-white p-5 w-full  border-b">
               <h1 class="text-center font-semibold text-teal-600">Import Students</h1>
            </div>
            <div class="card-body py-5">
                <form method="POST" action="{{route('import.users')}}" class="mx-auto" id="delivery"
                enctype="multipart/form-data">
                @csrf
                <div class="relative">
                    <div class="overflow-hidden relative w-64 mt-4 mb-4">
                        <div class="flex items-center justify-center bg-grey-lighter">
                            <label
                                class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-teal-600 hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal" id="selected">Select a file</span>
                                <input type='file' class="hidden" name="file" id="fileName" onchange="setName()" />
                            </label>
                        </div>

                    </div>
                </div>

                <button type="submit"
                class="w-8/12 mb-5 font-semibold md:w-5/12 py-2 flex mx-auto  justify-center bg-teal-600 text-gray-200 ">Save</button>

                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script>
             function setName(){
             let fileName = document.getElementById('fileName');
             var cad = fileName.value;
             cad = cad.split('\\');
             let selected = document.getElementById('selected');
             selected.innerHTML = cad[2];
            fileDocument = document.getElementById("fileName").files[0];
            fileDocument_url = URL.createObjectURL(fileDocument);
            document.getElementById('viewer').setAttribute('src', fileDocument_url);
            }
        </script>
    @endpush
@endsection
