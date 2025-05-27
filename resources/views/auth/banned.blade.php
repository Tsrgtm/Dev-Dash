@extends('layouts.guest')

@section('title', 'Banned | DEV Dash')

@section('content')
    {{-- <div>
        <div class="flex items-center justify-center flex-col gap-2 text-center mb-8">
            <div
                class="flex items-center justify-center p-2 rounded-md bg-gradient-to-r from-primary-light to-primary-dark dark:from-primary-dark dark:to-primary-light text-white">
                <x-heroicon-o-code-bracket class="w-8 h-8" />
            </div>
            <h1 class="mt-2 text-2xl font-bold text-gray-800 dark:text-gray-200">Account Access Restricted</h1>
            <p class="text-gray-600 dark:text-gray-400">
                You have been banned from DEV Dash.
            </p>
        </div>
    </div> --}}
    <div
        class="max-w-md w-full mx-auto relative sm:bg-white/20 dark:sm:bg-gray-800/20 sm:backdrop-filter sm:backdrop-blur-xl sm:rounded-md sm:border sm:border-white/50 sm:shadow-lg dark:sm:border-gray-800/50 p-8 sm:p-12">
        <div class="text-center">
            <div
                class="flex items-center justify-center p-3 rounded-full bg-red-300 dark:bg-red-800 text-red-800 dark:text-red-300 w-max mx-auto mb-8">
                <x-heroicon-o-no-symbol class="w-10 h-10" />
            </div>

            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800 dark:text-gray-200 mb-4">
                Account Access Restricted
            </h1>

            <p class="text-gray-600 dark:text-gray-400 text-lg mb-6">
                We regret to inform you that your account has been suspended due to a violation of our terms of service or
                community guidelines.
            </p>
            <p class="text-gray-600 dark:text-gray-400 text-md mb-8">
                Access to our services and content from this account is currently unavailable.
            </p>

            <div class="bg-red-50 dark:bg-red-900 border-l-4 border-red-500 dark:border-red-700 p-4 rounded-md mb-8">
                <p class="text-red-700 dark:text-red-300 text-sm">
                    If you believe this is an error or wish to appeal this decision, please contact our support team at:
                    <a href="mailto:support@devdash.com"
                        class="font-semibold text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-200 underline">support@devdash.com</a>.
                </p>
                <p class="text-red-700 dark:text-red-300 text-xs mt-2">
                    Please include your username and any relevant information regarding your case.
                </p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full cursor-pointer mt-4 bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md font-medium dark:bg-red-600 dark:hover:bg-red-700">Logout</button>
            </form>

            <p class="mt-10 text-xs text-gray-400">
                &copy; {{ date('Y') }} {{ config('app.name', 'Your Platform') }}. All rights reserved.
            </p>
        </div>

    </div>
@endsection
