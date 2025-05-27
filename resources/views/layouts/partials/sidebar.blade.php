<div class="space-y-6 px-4 py-6 lg:px-0 lg:py-0">
    <div
        class="lg:bg-white/20 lg:dark:bg-black/10 lg:backdrop-blur lg:border lg:border-gray-300 lg:dark:border-gray-800 rounded-md lg:p-4">
        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-2">
            About DEV Dash
        </h3>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            DEV Dash is a community of developers sharing
            knowledge, experiences, and ideas. Join us to grow
            together!
        </p>
        <div class="flex flex-col space-y-3 text-center">
            @guest
                <a href="{{ route('register') }}"
                    class="bg-primary-light dark:bg-primary-dark text-white py-2 px-4 rounded-lg font-medium hover:opacity-90 transition-opacity">
                    Sign Up
                </a>
                <a href="{{ route('login') }}"
                    class="border border-primary-light dark:border-primary-dark text-primary-light dark:text-primary-dark py-2 px-4 rounded-lg font-medium hover:bg-primary-light/10 dark:hover:bg-primary-dark/10 transition-colors">
                    Log In
                </a>
            @else
                <a href="#"
                    class="flex-1 bg-primary-light dark:bg-primary-dark text-white py-2 px-4 rounded-lg font-medium hover:opacity-90 transition-opacity">
                    Create Post
                </a>
            @endguest
        </div>
    </div>
    <div class="space-y-2">
        <x-livewire-link href="/"
            class="inline-flex gap-x-3 p-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
            <img src="{{ asset('assets/icons/house.png') }}" alt="" class="h-6 w-6" />
            <span>Home</span>
        </x-livewire-link>
        <x-livewire-link href="/discover"
            class="inline-flex gap-x-3 p-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
            <img src="{{ asset('assets/icons/discover.png') }}" alt="" class="h-6 w-6" />
            <span>Discover</span>
        </x-livewire-link>
        <x-livewire-link href="/tags"
            class="inline-flex gap-x-3 p-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
            <img src="{{ asset('assets/icons/tags.png') }}" alt="" class="h-6 w-6" />
            <span>Tags</span>
        </x-livewire-link>
        <x-livewire-link href="/about"
            class="inline-flex gap-x-3 p-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
            <img src="{{ asset('assets/icons/about.png') }}" alt="" class="h-6 w-6" />
            <span>About</span>
        </x-livewire-link>
        <x-livewire-link href="/contact"
            class="inline-flex gap-x-3 p-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
            <img src="{{ asset('assets/icons/contact.png') }}" alt="" class="h-6 w-6" />
            <span>Contact</span>
        </x-livewire-link>
    </div>

    <div class="space-y-2">
        <h3 class="text-sm font-bold text-gray-900 dark:text-gray-100">Others</h3>
        <x-livewire-link href="/code-of-conduct"
            class="inline-flex gap-x-3 p-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
            <img src="{{ asset('assets/icons/handshake.png') }}" alt="" class="h-6 w-6" />
            <span>Code of Conduct</span>
        </x-livewire-link>

        <x-livewire-link href="/privacy"
            class="inline-flex gap-x-3 p-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
            <img src="{{ asset('assets/icons/lock.png') }}" alt="" class="h-6 w-6" />
            <span>Privacy Policy</span>
        </x-livewire-link>
        <x-livewire-link href="/terms"
            class="inline-flex gap-x-3 p-2 rounded-md w-full border border-transparent hover:bg-slate-200 hover:text-slate-900 hover:border-slate-300 dark:hover:bg-slate-700 dark:hover:text-white dark:hover:border-slate-600">
            <img src="{{ asset('assets/icons/terms.png') }}" alt="" class="h-6 w-6" />
            <span>Terms of Use</span>
        </x-livewire-link>
    </div>
</div>
