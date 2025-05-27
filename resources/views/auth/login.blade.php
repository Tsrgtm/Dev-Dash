@extends('layouts.guest')

@section('content')
    <div
        class="max-w-md w-full mx-auto relative sm:bg-white/20 sm:dark:bg-gray-800/20 sm:backdrop-filter sm:backdrop-blur-xl sm:rounded-md sm:border sm:border-white/50 sm:shadow-lg sm:dark:border-gray-800/50 p-0 sm:p-6">
        <div class="flex items-center justify-center flex-col gap-2 text-center mb-8">
            <div
                class="flex items-center justify-center p-2 rounded-md bg-gradient-to-r from-primary-light to-primary-dark dark:from-primary-dark dark:to-primary-light text-white">
                <x-heroicon-o-code-bracket class="w-8 h-8" />
            </div>
            <h1 class="mt-2 text-2xl font-bold text-gray-800 dark:text-gray-200">Welcome Back to DEV Dash!</h1>
            <p class="text-gray-600 dark:text-gray-400">
                Join the community of developers sharing knowledge, experiences, and ideas.
            </p>
        </div>
        {{-- <div class="flex flex-wrap items-center justify-center gap-2 w-full mb-4">
            <a href="#"
                class="w-full text-white bg-[#24292F] hover:bg-[#2f363d] focus:ring-2 focus:ring-[#57606a]
      font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center
      dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-[#30363d]">
                <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                    <path fill="currentColor"
                        d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8z">
                    </path>
                </svg>
                Sign in with GitHub
            </a>
            <a href="#"
                class="w-full bg-[#EA4335] dark:bg-[#EA4335] text-white hover:bg-[#EA4335]/90 dark:hover:bg-[#EA4335]/90 focus:ring-2 focus:ring-[#EA4335]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center dark:focus:ring-[#EA4335]/55">
                <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512">
                    <path fill="currentColor"
                        d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                    </path>
                </svg>
                Sign in with Google
            </a>
        </div>

        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 text-gray-600 dark:text-gray-400">OR</span>
            </div>
        </div> --}}

        <form method="POST" action="{{ route('login') }}" x-data="{ loading: false }" @submit="loading = true">
            @csrf
            <x-input label="Email" type="email" name="email" placeholder="Enter your email address" />
            <x-input label="Password" type="password" name="password" placeholder="Enter your password" />
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <input id="remember-me" type="checkbox"
                        class="h-4 w-4 rounded-md  accent-primary-light dark:accent-primary-dark" name="remember" />
                    <label for="remember-me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                        Remember me
                    </label>
                </div>
                <a href="#" class="text-sm text-primary-light dark:text-primary-dark hover:underline">
                    Forgot password?
                </a>
            </div>

            <button type="submit" :disabled="loading" :class="{ 'opacity-50 cursor-not-allowed': loading }"
                class="inline-flex items-center justify-center w-full mt-6 border border-primary-light dark:border-primary-dark bg-primary-light dark:bg-primary-dark text-white py-2 px-4 rounded-lg font-medium hover:opacity-90 transition-opacity">
                <span x-show="!loading">Login</span>
                <span x-cloak x-show="loading">Logging in...</span>
            </button>
        </form>

        <div class="mt-4 text-center text-sm text-gray-700 dark:text-gray-300">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-primary-light dark:text-primary-dark hover:underline">Sign up</a>
        </div>
    </div>
@endsection
