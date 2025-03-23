<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>To-do List</title>
    <!-- Styles / Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-white dark:bg-gray-800">
    <main class="flex w-full h-full">
        <div class="flex w-full relative z-10 mt-5 ml-5 mr-5 opacity-90">
            {{$slot}}
        </div>
    </main>
</body>

</html>