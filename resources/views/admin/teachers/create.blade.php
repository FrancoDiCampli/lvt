@extends('layouts.dashboard')

@section('content')

{{-- card tarea --}}
<div class="container font-montserrat text-sm mb-8">
    <div class="card  rounded-sm bg-gray-100 mx-auto mt-6 shadow-lg md:w-10/12">
        <div class="card-title bg-white w-full p-5 border-b flex items-center justify-between md:justify-between">
            <div>
                <p class="sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold placeholder-gray-700">Nueva Tarea</p>
                <p class="md:text-md text-sm text-primary-500 font-semibold">{{$subject->name}}</p>
                <p class="md:text-sm text-xs text-primary-400">{{$subject->course->name}}</p>
            </div>
            <a href="{{route('teacher.index', $subject->id)}}" class="flex text-teal-600 font-semibold p-3 rounded-full hover:bg-gray-200 mx-1 focus:shadow-sm focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" viewBox="0 0 306 306"><path data-original="#000000" class="active-path" data-old_color="#000000" fill="#A0AEC0" d="M247.35 35.7L211.65 0l-153 153 153 153 35.7-35.7L130.05 153z"/></svg>
              </a>
        </div>
        <div class="card-body py-4">
            <form method="POST" action="{{route('teachers.store')}}" enctype="multipart/form-data" class="mx-auto" id="form">
                @csrf

                <input hidden type="text" name="subject" id="" value="{{$subject->id}}">

                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Título
                        </label>
                        <input type="text" id="title" onkeyup="setTitle()" name="title" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Título de la tarea" value="{{ old('title') }}"  autocomplete="off">
                        <span class="flex italic text-red-600  text-sm" role="alert" id="titleError">
                            {{$errors->first('title')}}
                        </span>
                    </div>
                </div>

                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-1">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Descripción/Instrucciones
                        </label>
                        <textarea name="description" id="description" onkeyup="setDescription()" cols="30" rows="10" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Descripción o instrucciones de la tarea" value="" maxlength="3001"></textarea>
                        <span class="flex italic text-red-600  text-sm" role="alert" id="descriptionError">
                            {{$errors->first('content')}}
                        </span>
                    </div>
                </div>

                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-1">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Fecha de Inicio
                        </label>
                        <input type="date" id="start" name="start" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Título de la tarea" value="{{ old('start') }}">
                        <span class="flex italic text-red-600  text-sm" role="alert">
                            {{$errors->first('title')}}
                        </span>
                    </div>
                </div>

                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-1">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Fecha Límite de Entrega
                        </label>
                        <input type="date" id="end" name="end" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Título de la tarea" value="{{ old('end') }}">
                        <span class="flex italic text-red-600  text-sm" role="alert">
                            {{$errors->first('title')}}
                        </span>
                    </div>
                </div>

                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Link de Youtube (Opcional)
                        </label>
                        <input type="text" name="link" id="link" value="{{ old('link') }}" class="form-input w-full block" id="grid-last-name" type="text" placeholder="Link del video">
                        <span class="flex italic text-red-600  text-sm" role="alert">
                            {{$errors->first('title')}}
                        </span>
                    </div>
                </div>

                <div class="flex flex-wrap my-5">
                    <div class="w-full md:w-full px-6 md:mb-0 mb-1">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          File
                        </label>
                        <div class="relative">
                            <div class="overflow-hidden relative w-auto mt-4 mb-4">
                                <div class="flex items-center justify-center bg-grey-lighter">
                                    <label id="file"
                                        class="w-full flex flex-col items-center px-4 py-4 bg-gray-200 text-gray-700 border-b-2 border-gray-400 tracking-wide uppercase cursor-pointer hover:text-primary-300 hover:bg-gray-300">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        <span class="mt-2 text-sm leading-normal" id="selected">Select a file</span>
                                        <input type='file' class="hidden" name="file" id="fileName"
                                            onchange="setName()"/>
                                    </label>
                                </div>
                                <span class="flex italic text-red-600  text-sm" role="alert" id="fileError">
                                    {{$errors->first('title')}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="flex mx-auto btn btn-primary">Save</button>

            </form>
        </div>
    </div>
</div>






            {{-- star modal --}}
            <div
                class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                <div class="modal-container bg-white mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <div class="modal-content py-4 text-left px-6">
                        <div class="flex justify-end items-center pb-3">
                            <div class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <iframe id="viewer" height="600" width="800" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}

@endsection

@push('js')
<script>
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

    function setName(){
        let fileName = document.getElementById('fileName');
        var cad = fileName.value;
        cad = cad.split('\\');
        let selected = document.getElementById('selected');
        selected.innerHTML = cad[2];
        fileDocument = document.getElementById("fileName").files[0];
        fileDocument_url = URL.createObjectURL(fileDocument);
        document.getElementById('viewer').setAttribute('src', fileDocument_url);
        let ancho = screen.width;
        if (ancho <= 640) {
            let marco = document.getElementById('viewer');
            marco.setAttribute('height',200);
            marco.setAttribute('width',270);
        }
        toggleModal();

        //valifación input file
        if(fileName.value.length != 0){
            document.getElementById("fileError").innerHTML = ""
            file.classList.remove("border-red-500")
        }
        else{
            document.getElementById("fileError").innerHTML = "El campo es obligatorio"
            file.classList.add("border-red-500")
        }
    }

    //Validaciones
    const form = document.getElementById("form")
    const title = document.getElementById("title")
    const description = document.getElementById("description")
    const fileName = document.getElementById("fileName")
    const file = document.getElementById("file")
    const titleError = document.getElementById("titleError")
    const descriptionError = document.getElementById("descriptionError")

    form.addEventListener("submit", e=>{

        titleError.innerHTML = ""
        // title.className = "form-input w-full block"
        // if (title.value.length >= 6){
        //     e.preventDefault()
        //     document.getElementById("titleError").innerHTML = "No puede superar los 5 caracteres"
        //     title.className = 'form-input form-input-error w-full block'
        // }
        // if (title.value.length === 0){
        //     e.preventDefault()
        //     document.getElementById("titleError").innerHTML = "El campo es obligatorio"
        //     title.className = 'form-input form-input-error w-full block'
        // }
        if (description.value.length > 3000){
            e.preventDefault()
            document.getElementById("descriptionError").innerHTML = "No puede tener más de 3000 caracteres"
            description.className = 'form-input form-input-error w-full block'
        }
        if (description.value.length === 0){
            e.preventDefault()
            document.getElementById("descriptionError").innerHTML = "El campo es obligatorio"
            description.className = 'form-input form-input-error w-full block'
        }



        // fileDocument = document.getElementById("fileName").files[0];
        if(fileName.value.length != 0){
            document.getElementById("fileError").innerHTML = ""
            file.classList.remove("border-red-500")
        }
        else{
            e.preventDefault()
            document.getElementById("fileError").innerHTML = "El campo es obligatorio"
            file.classList.add("border-red-500")
        }






    })

    // set title
    // function setTitle(){
    //     if (title.value.length >= 6){
    //         document.getElementById("titleError").innerHTML = "No puede tener más de 5 caracteres"
    //         title.classList.add("form-input-error")
    //     }
    //     if (title.value.length < 6){
    //         document.getElementById("titleError").innerHTML = ""
    //         title.classList.remove("form-input-error")
    //     }
    // }

    // set description
    function setDescription(){
        if (description.value.length > 3000){
            document.getElementById("descriptionError").innerHTML = "No puede tener más de 3000 caracteres"
            description.classList.add("form-input-error")
        }
        if (description.value.length <= 3000){
            document.getElementById("descriptionError").innerHTML = ""
            description.classList.remove("form-input-error")
        }

    }



</script>
@endpush
