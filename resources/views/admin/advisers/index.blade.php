@extends('layouts.dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3">
{{-- borrador card --}}
    <div class="w-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl bg-white m-4 font-montserrat border-b-4 border-gray-600">
        <div class="flex flex-col min-h-full">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="pb-2 pt-2  w-1/2">
                    <a href="{{route('adviser.eraser')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386.615 386.615" width="62" height="62"><path d="M36.573 309.292h2.09l100.833-21.943a9.924 9.924 0 005.224-2.612l170.84-170.841a65.833 65.833 0 0019.331-47.02 67.916 67.916 0 00-19.331-47.543A65.825 65.825 0 00268.54.003a64.262 64.262 0 00-47.02 19.853L51.201 190.696a9.404 9.404 0 00-3.135 4.702L26.124 296.231a11.493 11.493 0 003.135 9.927 10.45 10.45 0 007.314 3.134zM268.54 20.901c25.103-.002 45.454 20.347 45.456 45.45l-.003.525a43.886 43.886 0 01-13.061 31.869l-64.261-64.784a44.93 44.93 0 0131.869-13.06zm-46.498 28.212l64.261 64.261-148.898 148.375-64.261-63.739L222.042 49.113zM64.785 218.909l51.722 51.722-66.351 14.629 14.629-66.351zM368.328 365.717H18.287c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h350.041c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#0E2A3F"/></svg>
                    </a>
                </div>
                <div class=" w-1/2">
                    <a href="{{route('adviser.eraser')}}">
                        <h1 class="font-montserrat font-semibold text-lg text-right text-bluedark-500">Tareas en Borrador</h1>
                    </a>
                    <h1 class="text-sm font-montserrat font-medium text-right text-gray-700">Total: {{count($jobs)}}</h1>
                </div>
            </div>
        </div>
    </div>
{{-- activas card --}}
    <div class="w-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl bg-white m-4 font-montserrat border-b-4 border-green-600">
        <div class="flex flex-col min-h-full">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="pb-2 pt-2 w-1/2">
                    <a href="{{route('adviser.active')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 477.867 477.867" width="62" height="62"><path d="M238.933 0C106.974 0 0 106.974 0 238.933s106.974 238.933 238.933 238.933 238.933-106.974 238.933-238.933C477.726 107.033 370.834.141 238.933 0zm0 443.733c-113.108 0-204.8-91.692-204.8-204.8s91.692-204.8 204.8-204.8 204.8 91.692 204.8 204.8c-.122 113.058-91.742 204.678-204.8 204.8z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#0E2A3F"/><path d="M370.046 141.534c-6.614-6.388-17.099-6.388-23.712 0l-158.601 158.6-56.201-56.201c-6.548-6.78-17.353-6.967-24.132-.419-6.78 6.548-6.967 17.353-.419 24.132.137.142.277.282.419.419l68.267 68.267c6.664 6.663 17.468 6.663 24.132 0l170.667-170.667c6.548-6.779 6.36-17.583-.42-24.131z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#0E2A3F"/></svg>
                    </a>
                </div>
                <div class="w-1/2">
                    <a href="{{route('adviser.active')}}">
                        <h1 class="font-montserrat font-semibold text-lg text-right text-bluedark-500">Tareas Activas</h1>
                    </a>
                    <h1 class="text-sm font-montserrat font-medium text-right text-gray-700">Total: {{count($activas)}}</h1>
                </div>
            </div>
        </div>
    </div>
{{-- rechazadas card --}}
    <div class="w-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl bg-white m-4 font-montserrat border-b-4 border-red-600">
        <div class="flex flex-col min-h-full">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="pb-2 pt-2  w-1/2">
                    <a href="{{route('adviser.rejected')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.995 511.995" width="62" height="62"><path d="M437.126 74.939c-99.826-99.826-262.307-99.826-362.133 0C26.637 123.314 0 187.617 0 256.005s26.637 132.691 74.993 181.047c49.923 49.923 115.495 74.874 181.066 74.874s131.144-24.951 181.066-74.874c99.826-99.826 99.826-262.268.001-362.113zM409.08 409.006c-84.375 84.375-221.667 84.375-306.042 0-40.858-40.858-63.37-95.204-63.37-153.001s22.512-112.143 63.37-153.021c84.375-84.375 221.667-84.355 306.042 0 84.355 84.375 84.355 221.667 0 306.022z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#0E2A3F"/><path d="M341.525 310.827l-56.151-56.071 56.151-56.071c7.735-7.735 7.735-20.29.02-28.046-7.755-7.775-20.31-7.755-28.065-.02l-56.19 56.111-56.19-56.111c-7.755-7.735-20.31-7.755-28.065.02-7.735 7.755-7.735 20.31.02 28.046l56.151 56.071-56.151 56.071c-7.755 7.735-7.755 20.29-.02 28.046 3.868 3.887 8.965 5.811 14.043 5.811s10.155-1.944 14.023-5.792l56.19-56.111 56.19 56.111c3.868 3.868 8.945 5.792 14.023 5.792a19.828 19.828 0 0014.043-5.811c7.733-7.756 7.733-20.311-.022-28.046z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#0E2A3F"/></svg>
                    </a>
                </div>
                <div class=" w-1/2">
                    <a href="{{route('adviser.rejected')}}">
                        <h1 class="font-montserrat font-semibold text-lg text-right text-bluedark-500">Tareas Rechazadas</h1>
                    </a>
                    <h1 class="text-sm font-montserrat font-medium text-right text-gray-700">Total: {{count($rechazadas)}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
