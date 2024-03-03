@extends('layouts.app')
@section('navBar')
    @include('layouts.navigation')
@endsection
@section('content')
    <section class="bg-white shadow-2xl rounded-sm overflow-hidden h-72 w-52">
        <img class="h-1/2 bg-black w-full object-cover object-center" src="product1.jpg" alt="Product 1">
        <section class="py-2 px-3 mt-2">
            <p class="font-bold text-xl">Product Name 1</p>
            <section class="mt-2">
                <span>Price :</span>
                <p class="text-gray-600 inline">$19.99</p>
            </section>
        </section>
        <section>

        </section>
    </section>
@endsection
