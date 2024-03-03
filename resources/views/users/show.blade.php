@extends('layouts.app')
@section('navBar')
    @include('layouts.navigation')
@endsection
@section('sideBar')
    <div class="mb-6">
        <h1 class="text-xl text-gray-600 font-semibold ">Menu</h1>
    </div>
    <ul class="space-y-4">
        <li class="px-4 py-2 hover:bg-gray-700 hover:text-white transition duration-300 rounded-md border border-gray-400">
            <a href="{{ route('admin.dashboard') }}" class="block">Dashboard</a>
        </li>
    </ul>
@endsection
@section('content')
    <section class="bg h-full mx-auto w-2/6 min-w-96 rounded-sm shadow-2xl p-8">
        <section class="h-56 w-56 mx-auto rounded-full">
            <img src="{{ asset('Images/websitelogo.png') }}" alt=""
                class="h-full w-full object-cover rounded-full border border-black">
        </section>
        <section class="mt-20 space-y-3">
            <section>
                <strong class="text-xl text-gray-800">Name :</strong>
                <span class="text-lg text-gray-500">{{ $user->name }}</span>
            </section>
            <section>
                <strong class="text-xl text-gray-800">Email :</strong>
                <span class="text-lg text-gray-500">{{ $user->email }}</span>
            </section>
            <section>
                <strong class="text-xl text-gray-800">Phone :</strong>
                <span class="text-lg text-gray-500">{{ $user->phone }}</span>
            </section>
        </section>
    </section>
@endsection
