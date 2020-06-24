@extends('layouts.dashboard')

@section('content')

    <div class="flex flex-wrap">

        @foreach ($jobs ?? [] as $job)
             <div class="mx-2 text-white card bg-gradient-green rounded-sm font-montserrat w-5/12 flex p-5 justify-between mt-5 items-center">
                <div>
                    <a href="{{route('jobs.descargar', $job->file_path)}}">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="file-download"
                            class="h-12 w-12 svg-inline--fa fa-file-download fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm76.45 211.36l-96.42 95.7c-6.65 6.61-17.39 6.61-24.04 0l-96.42-95.7C73.42 337.29 80.54 320 94.82 320H160v-80c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v80h65.18c14.28 0 21.4 17.29 11.27 27.36zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"/></svg>

                    </a>
                </div>
                <div>
                    <h1 class="text-sm">{{$job->title}}</h1>
                    <a href="{{route('deliver', $job->id)}}">
                        <span>Entregar</span>
                    </a>
                </div>

            </div>
        @endforeach

    </div>
@endsection
