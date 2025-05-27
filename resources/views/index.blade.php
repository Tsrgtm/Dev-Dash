@extends('layouts.app')

@section('title', 'DEV Dash | Where Developers Share')

@section('sidebar', true)

@section('content')
    <div class="flex-1">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-4">Welcome to DEV Dash</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">Where developers share, collaborate, and learn.</p>

        </div>

        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">About DEV Dash</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">DEV Dash is a community of developers sharing
                knowledge,
                experiences, and ideas. Join us to grow together!</p>
        </div>

        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Join the Community</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">DEV Dash is a community of developers sharing
                knowledge,
                experiences, and ideas. Join us to grow together!</p>
        </div>
    </div>

    <div class="w-72 2xl:w-80 hidden xl:block transition-all duration-300">
        @livewire('home.extra-bar')
    </div>
@endsection
