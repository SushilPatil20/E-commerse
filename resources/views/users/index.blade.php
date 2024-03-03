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
    <section class="w-3/4 mx-auto relative mt-14">
        <table class="table table-dark table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sr.</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col" colspan="2">Action's</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) != 0)
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td><a href="{{ route('users.show', $user->id) }}"
                                    class="underline text-blue-400 hover:text-blue-600">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td class="flex space-x-3">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white rounded-md px-3 py-1 hover:bg-red-500"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </section>

@endsection
