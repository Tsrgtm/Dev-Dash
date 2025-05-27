<nav class="sticky top-0 z-40 bg-white dark:bg-gray-950 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-2">
            <div class="flex items-center gap-4">
                <div x-data="{ open: false }" x-effect="document.body.style.overflow = open ? 'hidden' : 'auto'"
                    class="block lg:hidden text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <x-heroicon-o-bars-4 class="w-8 cursor-pointer" @click="open = true" />

                    <div x-cloak class="fixed inset-0 w-full z-50 overflow-y-auto" x-show="open">
                        <div @click="open = false" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
                        <div
                            class="relative z-51 w-64 h-full max-h-screen overflow-y-auto bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700">
                            <div
                                class="flex items-center justify-between py-4 px-4 bg-white dark:bg-gray-900 sticky top-0">
                                <h3 class="text-lg font-bold">DEV Dash</h3>
                                <x-heroicon-o-x-mark class="w-6 cursor-pointer" @click="open = false" />
                            </div>
                            @include('layouts.partials.sidebar')
                        </div>

                    </div>
                </div>
                <x-livewire-link href="/" class="flex items-center">
                    <div
                        class="flex items-center justify-center p-1 rounded-md bg-gradient-to-r from-primary-light to-primary-dark dark:from-primary-dark dark:to-primary-light text-white">
                        <span class="font-bold text-2xl m-0">&#60;</span>
                        <span class="font-bold text-2xl m-0">D</span>
                        <span class="font-bold text-2xl m-0" style="transform: scaleX(-1);">D</span>
                        <span class="font-bold text-2xl m-0">&#62;</span>
                    </div>

                </x-livewire-link>
            </div>

            <div class="flex items-center space-x-3 sm:space-x-4">
                @livewire('global-search')


                <div class="hidden sm:block border-l border-gray-300 dark:border-gray-600 min-h-6 "></div>

                <div class="flex sm:space-x-3 items-center">
                    @guest
                        <x-livewire-link href="{{ route('login') }}"
                            class="inline-flex items-center border border-primary-light dark:border-primary-dark text-primary-light dark:text-primary-dark py-1.5 sm:py-2 px-4 rounded-lg font-medium hover:bg-primary-light/10 dark:hover:bg-primary-dark/10 transition-colors">
                            Log In
                        </x-livewire-link>
                        <x-livewire-link href="{{ route('register') }}"
                            class="hidden lg:inline-flex items-center border border-primary-light dark:border-primary-dark bg-primary-light dark:bg-primary-dark text-white py-2 px-4 rounded-lg font-medium hover:opacity-90 transition-opacity">
                            Sign Up
                        </x-livewire-link>
                    @else
                        <x-livewire-link href="/create-post"
                            class="hidden lg:inline-flex items-center border border-primary-light dark:border-primary-dark bg-primary-light dark:bg-primary-dark text-white py-2 px-4 rounded-lg font-medium hover:opacity-90 transition-opacity">
                            Create Post
                        </x-livewire-link>
                        <a href=""
                            class="inline-flex items-center sm:border border-transparent p-1 sm:hover:bg-primary-light/30 rounded-md transition duration-300 ease-in-out">
                            <x-heroicon-o-bell class="w-7 sm:w-8" />
                        </a>
                    @endguest
                </div>
                @auth
                    <div class="flex items-center relative" x-data="{ open: false }" @click="open = !open">
                        <button
                            class="p-1 hover:bg-primary-light/30 dark:hover:bg-primary-dark/90 rounded-full transition duration-300 ease-in-out">
                            <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : auth()->user()->avatar_temporary }}"
                                alt="{{ auth()->user()->name }}" class="rounded-full h-8 w-8 sm:h-9 sm:w-9">
                        </button>
                        <div x-cloak @click.outside="open = false" x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute top-full right-0 mt-1 w-48 rounded-md shadow-lg p-2 bg-white dark:bg-gray-950 border border-gray-300 dark:border-gray-700 overflow-hidden">
                            <x-livewire-link href="{{ route('users.show', auth()->user()->username) }}"
                                class="space-y-1 hover:bg-primary-light/30 px-4 py-2 rounded-md group flex flex-col">
                                <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 group-hover:underline">
                                    {{ auth()->user()->name }}
                                </h3>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">
                                    {{ '@' . auth()->user()->username }}
                                </p>
                            </x-livewire-link>
                            <hr class="border-gray-300 dark:border-gray-700 my-2">
                            <x-livewire-link href="/dashboard"
                                class="inline-flex gap-x-3 px-4 py-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
                                Dashboard
                            </x-livewire-link>
                            <x-livewire-link href="/create-post"
                                class="inline-flex gap-x-3 px-4 py-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
                                Create Post
                            </x-livewire-link>
                            <x-livewire-link href="/bookmarks"
                                class="inline-flex gap-x-3 px-4 py-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
                                Bookmarks
                            </x-livewire-link>
                            <x-livewire-link href="/settings"
                                class="inline-flex gap-x-3 px-4 py-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
                                Settings
                            </x-livewire-link>
                            <hr class="border-gray-300 dark:border-gray-700 my-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class="cursor-pointer inline-flex gap-x-3 px-4 py-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600"
                                    type="submit">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
</nav>
