@extends('layouts.dashboard')

@section('content')

<div class="container font-montserrat text-sm w-11/12">
    <div class="card  rounded-sm bg-gray-100 mx-auto md:mt-10 shadow-lg">
        <div
            class="card-title bg-white w-full p-1 md:p-5  border-b flex items-center justify-between md:justify-between ">
            <h1 class="text-teal-600 font-semibold">{{$job->title}}</h1>
        </div>
        <div class="card-body py-5">
            <form method="POST" action="{{route('deliver.store')}}" class="mx-auto" id="delivery"
                enctype="multipart/form-data">
                @csrf
                <input type="text" name="job" value="{{$job->id}}" hidden>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Deliver
                    </label>
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

                    <div class="">
                        <label for="">Leave a comment</label>
                        <button onclick="addComment(event)" class="bg-teal-600 text-white text-2xl p-2  ">+</button>
                    </div>
                    <div id="comment">

                    </div>

                </div>

                <button type="submit"
                    class="w-8/12 mb-5 font-semibold md:w-5/12 py-2 flex mx-auto  justify-center bg-teal-600 text-gray-200 ">Save</button>
            </form>

            <!--Modal-->
            <div
                class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                <div class="modal-container bg-white mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                    <div class="modal-content py-4 text-left px-6">
                        <!--Title-->
                        <div class="flex justify-end items-center pb-3">
                            {{-- <p class="text-2xl font-bold">Simple Modal!</p> --}}
                            <div class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <!--Body-->
                        <div class="flex justify-center">
                            <iframe class="hidden md:flex" id="viewer" height="600" width="800"
                                frameborder="0"></iframe>
                            <iframe class="flex md:hidden" id="viewer" height="200" width="300"
                                frameborder="0"></iframe>
                        </div>

                        <!--Footer-->
                        {{-- <div class="flex justify-end pt-2">
                            <button
                                class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Action</button>
                            <button
                                class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    let comment = `<div class="">
                        <label for="">Comment</label>
                        <textarea name="comment" id="" cols="60" rows="5" class=""></textarea>
                        </div> `
        let delivery = document.getElementById('delivery')
        delivery.addEventListener('submit',function(e){
            e.preventDefault();
           delivery.submit();

        })

        let com = document.getElementById('comment')

        function addComment(event){
            event.preventDefault()

            com.innerHTML = comment
        }

        function setName(){
             let fileName = document.getElementById('fileName');
             var cad = fileName.value;
             cad = cad.split('\\');
             let selected = document.getElementById('selected');
             selected.innerHTML = cad[2];
            fileDocument = document.getElementById("fileName").files[0];
            fileDocument_url = URL.createObjectURL(fileDocument);
            document.getElementById('viewer').setAttribute('src', fileDocument_url);
            toggleModal();
        }

        var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

</script>
@endpush
@endsection