@extends('layouts.dashboard')

@section('content')

<div class="card bg-white rounded-lg font-montserrat">
    <div class="card-title p-5">
        Teacher
    </div>

    <div class="card-body flex justify-around">
        <div class="">
            <div class="m-2">
                <span class="font-semibold">User ID</span>
                <p>franco@mail.com</p>
            </div>
            <div class="m-2">
                <span class="font-semibold">Role</span>
                <p>admin</p>
            </div>
        </div>

        <div>
            <div class="m-2">
                <span class="font-semibold">Created</span>
                <p>22-07-81</p>
            </div>
            <div class="m-2">
                <span class="font-semibold">State</span>
                <p>Active</p>
            </div>
        </div>

    </div>
</div>

@endsection
