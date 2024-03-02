<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="h-screen dark:bg-gray-900">
        @yield('navBar')
        <section class="flex w-full" style="height: 90%">
            <aside class="w-1/5 px-12 py-14 border-r border-gray-400 min-w-fit">
                @yield('sideBar')
            </aside>
            <main class="w-4/5 p-12 overflow-y-auto">
                @yield('content')
            </main>
        </section>
    </div>


    <script>
        let table = $('#myTable').DataTable({
            "lengthMenu": [
                [5, 10, 15, 20], // Display entries length in the menu options
                [5, 10, 15, 20] // Text displayed in the length menu
            ],
            "pageLength": 5, // Set the default page length to 5
            "ordering": true, // Enable or disable table ordering (sorting)
            "paging": true, // Enable or disable table paging
            "scrollY": "300px", // Set the vertical scroll height
            "scrollCollapse": true, // Enable vertical scrolling
        });
    </script>
</body>

</html>
