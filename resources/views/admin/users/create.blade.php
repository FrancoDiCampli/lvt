@extends('layouts.dashboard')

@section('content')
    <div class="container font-montserrat">
        <div class="card w-11/12 md:w-8/12 rounded-sm bg-gray-100 mx-auto mt-10 shadow-lg">
            <div class="card-title bg-white p-5 w-full  border-b">
               <h1 class="text-center font-semibold text-teal-600">Edit User</h1>
            </div>
            <div class="card-body py-5">
                <form method="POST" action="{{ route('user.store') }}" class="mx-auto" >
                    @csrf
                <input type="text" hidden name="user_id" value="{{$user->id}}">
                    <div class="my-2 flex items-center border w-8/12 mx-auto h-8 bg-white justify-between">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="envelope"
                        class="p-1 text-gray-600 mx-auto h-5 w-5  svg-inline--fa fa-envelope fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
                        <input disabled type="email"  name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="email" class="w-10/12 bg-transparent focus:outline-none">

                    </div>
                    <div class="my-2 flex items-center border w-8/12 mx-auto h-8 bg-white justify-between">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="user"
                        class="p-1 text-gray-600 mx-auto h-5 w-5 svg-inline--fa fa-user fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                        <input type="text"  name="name" value="{{ $user->name }}"  placeholder="user name" class="w-10/12 bg-transparent focus:outline-none">

                    </div>

                    <div class="my-2 flex items-center border w-8/12 mx-auto h-8 bg-white justify-between">
                        <svg aria-hidden="true" data-prefix="far" data-icon="id-card"
                        class="p-1 text-gray-600 mx-auto h-5 w-5 svg-inline--fa fa-id-card fa-w-18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 400H303.2c.9-4.5.8 3.6.8-22.4 0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6 0 26-.2 17.9.8 22.4H48V144h480v288zm-168-80h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm-168 96c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64z"/></svg>
                        <input type="text"  name="dni" value="{{ $data[0]->dni ?? "" }}"  placeholder="user dni" class="w-10/12 bg-transparent focus:outline-none">

                    </div>


                    <div class="my-2 flex items-center border w-8/12 mx-auto h-8 bg-white justify-between">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="phone"
                        class="p-1 text-gray-600 mx-auto h-5 w-5 svg-inline--fa fa-phone fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg>
                            <input type="text" name="phone" value="{{ $data[0]->phone ?? "" }}" placeholder="phone" class="w-10/12 bg-transparent focus:outline-none">

                    </div>

                    <div class="my-2 flex items-center border w-8/12 mx-auto h-8 bg-white justify-between">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt"
                        class="p-1 text-gray-600 mx-auto h-5 w-5 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                            <input type="text" name="address" value="{{ $data[0]->address ?? "" }}" placeholder="address" class="w-10/12 bg-transparent focus:outline-none">

                    </div>

                        <button type="submit" class="mb-5 font-semibold w-8/12 flex mx-auto text-center justify-center bg-teal-600 text-gray-200 px-5 py-2">Register</button>

                </form>


            </div>

        </div>

    </div>
@endsection
