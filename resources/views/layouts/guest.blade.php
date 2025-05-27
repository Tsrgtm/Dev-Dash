<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login | DEV Dash')</title>
    <script>
        (function() {
            const savedTheme = localStorage.getItem("theme");
            const html = document.documentElement;

            if (savedTheme === "dark") {
                html.classList.add("dark");
                html.setAttribute("data-theme", "dark");
            } else {
                html.classList.remove("dark");
                html.setAttribute("data-theme", "light");
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body
    class="relative bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen transition-colors duration-300 flex justify-center items-center flex flex-col justify-center items-center overflow-hidden py-12">

    @livewire('show-alerts')

    @include('layouts.partials.theme-toggle')

    <div class="hidden sm:block">
        <!-- Red blob -->
        <div
            class="absolute top-1/2 left-3/7 transform -translate-x-1/2 -translate-y-1/2 w-20 h-20 rounded-full bg-red-500 dark:bg-red-700 opacity-70 blur-[50px]">
        </div>

        <!-- Blue blob -->
        <div
            class="absolute top-5/7 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 rounded-full bg-blue-400 dark:bg-blue-600 opacity-60 blur-[50px]">
        </div>

        <!-- Green blob -->
        <div
            class="absolute top-1/2 right-2/5 transform -translate-x-1/2 -translate-y-1/2 w-20 h-20 rounded-full bg-green-400 dark:bg-green-700 opacity-80 blur-[50px]">
        </div>

        <!-- Purple blob -->
        <div
            class="absolute top-2/7 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-28 h-28 rounded-full bg-purple-500 dark:bg-purple-800 opacity-50 blur-[50px]">
        </div>
    </div>


    <main class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main> @livewireScripts
</body>

</html>
