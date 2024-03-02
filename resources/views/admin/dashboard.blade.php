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
            <a href="{{ route('products.index') }}" class="block">Dashboard</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="flex mx-auto justify-around">
        <div class="bg-white w-1/4 rounded-lg shadow-md p-6">
            <a href="{{ route('users.index') }}"
                class="text-xl font-semibold text-blue-400 hover:text-blue-600 hover:underline">Users</a>
            @if ($numberOfUsers != 0)
                <div class="mt-2 text-gray-600">Total users: <span class="font-bold">
                        {{ $numberOfUsers }}
                    </span>
                </div>
            @else
                <span class="block mt-2 text-gray-600">No user found..!</span>
            @endif

        </div>
        <div class="bg-white w-1/4 rounded-lg shadow-md p-6">
            <a href="{{ route('products.index') }}"
                class="text-xl font-semibold text-blue-400 hover:text-blue-600 hover:underline">Products</a>
            <div class="mt-2 text-gray-600">Total products: <span class="font-bold">{{ $numberOfProducts }}</span>
            </div>
        </div>
        <div class="bg-white w-1/4 rounded-lg shadow-md p-6">
            <div class="text-xl font-semibold text-blue-400 hover:text-blue-600 hover:underline">Orders</div>
            <div class="mt-2 text-gray-600">Total orders: <span class="font-bold">890</span></div>
        </div>
    </div>
@endsection
