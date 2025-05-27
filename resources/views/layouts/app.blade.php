<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'DEV Dash | Where Developers Share')</title>
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

<body id="main-content"
    class="bg-gray-100 dark:bg-black text-gray-900 dark:text-gray-100 min-h-screen transition-colors duration-300">

    @livewire('show-alerts')
    @include('layouts.partials.theme-toggle')
    @include('layouts.partials.navbar')

    <main class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
        @hasSection('sidebar')
            <div class="py-4 flex items-start gap-8">
                <div class="w-54 2xl:w-60 hidden lg:block transition-all duration-300">
                    @include('layouts.partials.sidebar')
                </div>
                @yield('content')
            </div>
        @else
            @yield('content')
        @endif
    </main>


    @livewireScripts
</body>

</html>
