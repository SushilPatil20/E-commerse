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
    <div class="bg-white  shadow-2xl rounded-lg overflow-hidden w-1/2 p-6 mx-auto">
        <a href="{{ route('products.index') }}" class="text-xl"><i class="fa-solid fa-angle-left"></i></a>
        <img src="/product_images/{{ $product->image }}" alt="Product Image" class="h-48 object-contain mx-auto">
        <div class="p-4">
            <h2 class="font-semibold text-xl">{{ $product->name }}</h2>
            <p class="text-gray-600 text-lg my-2">Description : {{ $product->description }}</p>
            <span class="text-gray-800 font-semibold">Price : ${{ $product->price }}</span>
        </div>
    </div>
@endsection
