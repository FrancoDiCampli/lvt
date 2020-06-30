@extends('layouts.dashboard')

@section('content')
<script src='https://meet.jit.si/external_api.js'></script>
<div class="grid grid-cols-1 lg:grid-cols-2">
    @foreach ($subjects as $subject)
    <div
        class="mx-2 text-white card bg-gradient-green rounded-sm font-montserrat w-auto flex p-5 justify-between mt-5 items-center">
        <div>
            <a href="{{route('teacher.index', $subject->id)}}">
                <svg aria-hidden="true" data-prefix="fas" data-icon="clipboard-list"
                    class="h-12 w-12 svg-inline--fa fa-clipboard-list fa-w-12" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512">
                    <path fill="currentColor"
                        d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z" />
                </svg>
            </a>
        </div>
        <div>
            <h1 class="text-sm">{{$subject->name}}</h1>
        </div>
    </div>
    @endforeach
</div>

{{-- Jitsi --}}

<div hidden>
    <div class="w-auto rounded overflow-hidden shadow-lg m-2">
        <div class="font-bold text-xl m-2">
            Jitsi
        </div>
        <div class="px-6 py-4">
            <button onclick="iniciar('{{$subject}}','{{now()->format('dmYHi')}}','{{auth()->user()}}')"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="start">Iniciar</button>
            <div class="rounded m-2" id="jitsi-container">
            </div>
        </div>
    </div>

</div>

@endsection

@push('js')
<script>
    function iniciar(subject, fecha, user){
        var usuario = JSON.parse(user);
        var materia = JSON.parse(subject);
        var container = document.getElementById('jitsi-container');
        var domain = "meet.jit.si";
        var options = {
            "roomName": materia.name+'-'+fecha,
            "parentNode": container,
            "width": 800,
            "height": 600,
            userInfo: {
                email: usuario.email,
                displayName: usuario.name
            }
        };
        api = new JitsiMeetExternalAPI(domain, options);
    }

</script>
@endpush
