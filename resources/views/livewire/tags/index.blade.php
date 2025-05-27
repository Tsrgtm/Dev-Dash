<div class="flex-1" x-data="{
    observe() {
        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && $wire.search === '') {
                    $wire.call('loadMore');
                }
            });
        });
        observer.observe(this.$refs.infiniteScroll);
    }
}" x-init="observe">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 w-full">
        <h1 class="text-3xl md:text-4xl font-bold">Tags</h1>
        <div class="flex flex-col md:items-center md:flex-row gap-4">
            @auth
                <div class="flex gap-2 items-center">
                    <x-livewire-link href="#"
                        class="inline-flex items-center py-2 px-4 rounded-md font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors">
                        Following Tags
                    </x-livewire-link>

                    <x-livewire-link href="#"
                        class="inline-flex items-center py-2 px-4 rounded-md font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors">
                        Hidden Tags
                    </x-livewire-link>
                </div>
            @endauth
            <div class="relative">
                <x-input type="search" placeholder="Search tags" wire:model.live="search" no_margin class="pl-9" />
                <x-heroicon-o-magnifying-glass class="absolute left-2 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" />
            </div>
        </div>
    </div>
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach ($tags as $tag)
            <div class="glass-card rounded-md p-4 flex flex-col justify-between">
                <div>
                    <div class="mb-2 flex items-center justify-between">
                        <h3
                            class="text-lg font-bold text-gray-900 dark:text-gray-100 overflow-hidden truncate whitespace-nowrap">
                            <a href="#">{{ $tag->name }}</a>
                        </h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap">
                            {{ readable_number($tag->posts()->count()) }} posts
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $tag->description }}
                    </p>
                </div>

                <div class="mt-4 flex items-center gap-4">
                    @auth
                        @if (!auth()->user()->isHiddenTag($tag))
                            <button wire:click="toggleFollow({{ $tag->id }})"
                                class="px-4 py-2 rounded-md transition duration-200 {{ auth()->user()->isFollowedTag($tag) ? 'bg-transparent border border-gray-300 dark:border-gray-700 hover:bg-gray-300/30 dark:hover:bg-gray-800/30' : 'bg-primary-light text-white dark:bg-primary-dark hover:bg-primary-light/80 dark:hover:bg-primary-dark/80' }}">
                                @if (auth()->user()->isFollowedTag($tag))
                                    Following
                                @else
                                    Follow
                                @endif
                            </button>

                            <button wire:click="toggleHide({{ $tag->id }})"
                                class="px-4 py-2 rounded-md transition duration-200 hover:bg-primary-light/30 dark:hover:bg-primary-dark/30">
                                Hide
                            </button>
                        @else
                            <button wire:click="toggleHide({{ $tag->id }})"
                                class="px-4 py-2 rounded-md transition duration-200 bg-red-500 text-white dark:bg-red-700 dark:text-white hover:bg-red-600 dark:hover:bg-red-800">
                                Unhide
                            </button>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 rounded-md transition duration-200 bg-primary-light text-white dark:bg-primary-dark hover:bg-primary-light/80 dark:hover:bg-primary-dark/80">
                            Follow
                        </a>

                        <a href="{{ route('login') }}"
                            class="px-4 py-2 rounded-md transition duration-200 hover:bg-primary-light/30 dark:hover:bg-primary-dark/30">
                            Hide
                        </a>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

    <div class="mx-auto mt-4 w-full max-w-xs">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 150" class="w-full h-12" wire:loading
            wire:target="loadMore">
            <path fill="none" stroke="#6366F1" stroke-width="15" stroke-linecap="round" stroke-dasharray="300 385"
                stroke-dashoffset="0"
                d="M275 75c0 31-27 50-50 50-58 0-92-100-150-100-28 0-50 22-50 50s23 50 50 50c58 0 92-100 150-100 24 0 50 19 50 50Z">
                <animate attributeName="stroke-dashoffset" calcMode="spline" dur="2" values="685;-685"
                    keySplines="0 0 1 1" repeatCount="indefinite"></animate>
            </path>
        </svg>
    </div>


    <div x-ref="infiniteScroll" class="h-1"></div>
</div>
