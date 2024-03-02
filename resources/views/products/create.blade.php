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
    <div class="flex justify-center items-center">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Product Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" name="name" type="text" placeholder="Enter product name"
                        value={{ old('name') }}>
                    @if ($errors->has('name'))
                        <span class="text-red-600">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="description" placeholder="Enter product description" name="description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-red-600">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                        Price
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="price" type="text" placeholder="Enter product price" name="price"
                        value="{{ old('price') }}">
                    @if ($errors->has('price'))
                        <span class="text-red-600">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <input type="file" name="image">
                    @if ($errors->has('image'))
                        <span class="text-red-600">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="flex justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-3"
                        type="submit">
                        Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
