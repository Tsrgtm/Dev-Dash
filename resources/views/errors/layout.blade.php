<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | DEV Dash</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Custom CSS primarily for animations and complex styles not easily covered by Tailwind utilities */
        body {
            font-family: 'Inter', sans-serif;
            /* Base font family */
        }

        .error-code-minimal {
            font-size: clamp(5rem, 18vw, 10rem);
            /* Responsive font size for the 404 text */
            /* Other .error-code-minimal styles like font-weight, line-height, color, position, z-index are now Tailwind classes */
        }

        /* Glitch Effect Styles - These are complex and remain custom */
        .glitch-effect::before,
        .glitch-effect::after {
            content: '404';
            /* Essential for the glitch effect - matches the @yield('code')

        or static text */ position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: #f3f4f6;
        /* Light mode glitch background - must match body */
        }

        .dark .glitch-effect::before,
        .dark .glitch-effect::after {
            background: #111827;
            /* Dark mode glitch background - must match body */
        }

        .glitch-effect::before {
            left: 2px;
            text-shadow: -2px 0 #ef4444;
            /* red-500 */
            animation: glitch-anim-1 2s infinite linear alternate-reverse;
        }

        .glitch-effect::after {
            left: -2px;
            text-shadow: -2px 0 #3b82f6, 2px 2px #ef4444;
            /* blue-500, red-500 */
            animation: glitch-anim-2 2s infinite linear alternate-reverse;
        }

        @keyframes glitch-anim-1 {
            0% {
                clip-path: polygon(0 2%, 100% 2%, 100% 5%, 0 5%);
            }

            10% {
                clip-path: polygon(0 15%, 100% 15%, 100% 15%, 0 15%);
            }

            20% {
                clip-path: polygon(0 10%, 100% 10%, 100% 20%, 0 20%);
            }

            30% {
                clip-path: polygon(0 1%, 100% 1%, 100% 2%, 0 2%);
            }

            40% {
                clip-path: polygon(0 33%, 100% 33%, 100% 33%, 0 33%);
            }

            50% {
                clip-path: polygon(0 44%, 100% 44%, 100% 44%, 0 44%);
            }

            60% {
                clip-path: polygon(0 50%, 100% 50%, 100% 20%, 0 20%);
            }

            70% {
                clip-path: polygon(0 70%, 100% 70%, 100% 70%, 0 70%);
            }

            80% {
                clip-path: polygon(0 80%, 100% 80%, 100% 75%, 0 75%);
            }

            90% {
                clip-path: polygon(0 50%, 100% 50%, 100% 55%, 0 55%);
            }

            100% {
                clip-path: polygon(0 60%, 100% 60%, 100% 70%, 0 70%);
            }
        }

        @keyframes glitch-anim-2 {
            0% {
                clip-path: polygon(0 78%, 100% 78%, 100% 100%, 0 100%);
            }

            10% {
                clip-path: polygon(0 2%, 100% 2%, 100% 5%, 0 5%);
            }

            20% {
                clip-path: polygon(0 80%, 100% 80%, 100% 100%, 0 100%);
            }

            30% {
                clip-path: polygon(0 50%, 100% 50%, 100% 100%, 0 100%);
            }

            40% {
                clip-path: polygon(0 22%, 100% 22%, 100% 100%, 0 100%);
            }

            50% {
                clip-path: polygon(0 1%, 100% 1%, 100% 100%, 0 100%);
            }

            60% {
                clip-path: polygon(0 10%, 100% 10%, 100% 100%, 0 100%);
            }

            70% {
                clip-path: polygon(0 5%, 100% 5%, 100% 100%, 0 100%);
            }

            80% {
                clip-path: polygon(0 30%, 100% 30%, 100% 100%, 0 100%);
            }

            90% {
                clip-path: polygon(0 15%, 100% 15%, 100% 100%, 0 100%);
            }

            100% {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }
        }

        /* Theme toggle icon animation - specific transforms and opacity for the rotating state */
        .theme-toggle-button.rotating .sun-icon {
            transform: rotate(-90deg) scale(0.5);
            opacity: 0;
        }

        .theme-toggle-button.rotating .moon-icon {
            transform: rotate(90deg) scale(0.5);
            opacity: 0;
        }

        /* Typewriter animation - keyframes remain custom */
        .typewriter-text {
            /* Base structural styles (display, overflow, whitespace, margin, letter-spacing, border) are now Tailwind classes */
            /* Animation properties are applied here for clarity */
            animation:
                typing 5s steps(30, end) infinite,
                /* steps should roughly match character count for best effect */
                blink-caret .75s step-end infinite;
            animation-delay: 0.5s;
            /* Delay before typing starts for the first run */
        }

        @keyframes typing {
            0% {
                width: 0;
                opacity: 1;
                /* Ensure opacity is 1 when typing starts/restarts */
            }

            70% {
                /* Text fully typed out, adjust percentage based on desired typing vs pause duration */
                width: 100%;
                opacity: 1;
            }

            90% {
                /* Pause with text visible */
                width: 100%;
                opacity: 1;
            }

            100% {
                /* Reset for next loop */
                width: 0;
                opacity: 1;
                /* Keep opacity 1 to avoid flicker before next typing starts */
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: #6366f1;
            }

            /* Light: indigo-500. Will be overridden by dark: variant if needed */
        }

        /* Specific dark mode blink caret color if different from text color, handled by dark:border-indigo-400 on element */
    </style>
</head>

<body
    class="flex flex-col items-center justify-center min-h-screen text-center p-4
             bg-gray-100 text-gray-700 dark:bg-gray-900 dark:text-gray-300
             transition-colors duration-300 ease-in-out">

    @include('layouts.partials.theme-toggle')

    <div class="content-wrapper-minimal relative z-10 p-8 max-w-[450px] w-full">
        <div class="error-code-minimal glitch-effect relative z-0 font-extrabold leading-none text-slate-300 dark:text-slate-700"
            aria-hidden="true">
            404 </div>

        <h1 id="page-not-found-heading"
            class="text-2xl sm:text-3xl font-semibold text-gray-800 dark:text-white mt-4 mb-8">
            <span
                class="typewriter-text inline-block overflow-hidden border-r-[.15em] border-indigo-500 dark:border-indigo-400 
                         whitespace-nowrap mx-auto tracking-[.1em] opacity-0">
                Page Not Found_ </span>
        </h1>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-3 sm:gap-4">
            <a href="{{ route('home') }}"
                class="bg-primary-light dark:bg-primary-dark text-white py-2.5 px-6 rounded-lg font-semibold hover:opacity-90 transition-opacity">
                Back to Home
            </a>

            <a href="#"
                class="border border-primary-light dark:border-primary-dark text-primary-light dark:text-primary-dark py-2.5 px-6 rounded-lg font-semibold hover:opacity-90 transition-opacity hover:bg-primary-light/10 dark:hover:bg-primary-dark/10 inline-flex items-center gap-3">
                <x-heroicon-o-link-slash class="w-6" />
                Report Page
            </a>
        </div>
    </div>

</body>

</html>
