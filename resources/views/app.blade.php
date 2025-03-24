<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>To-do List</title>
    <!-- Styles / Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireScripts
    @stack('scripts')
</head>

<body class="bg-white dark:bg-gray-800">
    <main class="flex w-full h-full">
        <div class="w-full h-full mr-5 ml-5 mt-5 mb-5">
            @yield('content')
        </div>
    </main>
    
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>