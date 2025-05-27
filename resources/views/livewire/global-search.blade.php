<div x-data="{ open: false }"
    @keydown.ctrl.q.window="open = true; $nextTick(() => $refs.searchInput.focus()); $wire.set('query', '')"
    @keydown.escape.window="open = false" class="relative">
    <!-- Trigger Button -->
    <button
        class="sm:border border-gray-300 dark:border-gray-600 px-1 py-1 sm:px-1 sm:py-0.5 sm:rounded-md flex items-center gap-x-3 cursor-pointer"
        @click="open = true; $nextTick(() => $refs.searchInput.focus()); $wire.set('query', '')">
        <x-heroicon-o-magnifying-glass class="w-7 sm:w-5 sm:text-gray-400 text-gray-700 dark:text-gray-300" />
        <kbd
            class="hidden sm:inline-block bg-gray-300 text-[9px] text-gray-800 dark:bg-gray-600 dark:text-gray-100 px-1 py-0.5 rounded-md border border-gray-400 dark:border-gray-500 shadow">
            Ctrl + Q
        </kbd>
    </button>

    <!-- Modal -->
    <template x-if="open">
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div @click="open = false" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
            <div
                class="relative z-51 bg-white dark:bg-gray-900 sm:rounded-md sm:shadow-xl w-full sm:max-w-xl overflow-hidden max-h-screen min-h-screen sm:min-h-0 sm:max-h-96 overflow-y-auto">
                <!-- Close Button -->
                <div class="sticky top-0 bg-white dark:bg-gray-900">
                    <kbd @click="open = false"
                        class="absolute top-4 right-4 cursor-pointer bg-gray-300 text-[9px] text-gray-800 dark:bg-gray-600 dark:text-gray-100 px-1 py-0.5 rounded-md border border-gray-400 dark:border-gray-500 shadow">
                        Esc
                    </kbd>

                    <!-- Input -->
                    <div class="px-6 py-8">
                        <input x-ref="searchInput" type="text" wire:model.live="query"
                            placeholder="Search Posts, Tags, Users..."
                            class="w-full border-b-2 border-transparent focus:outline-none focus:ring-0 focus:border-primary-light dark:focus:border-primary-dark py-2" />

                    </div>
                    <hr class="border-gray-200 dark:border-gray-700">
                </div>

                @if ($query)
                    <div class="flex items-center px-6 py-2">
                        <button @click="$wire.set('filter', 'all')"
                            class="px-4 py-1.5 font-medium text-sm leading-none cursor-pointer {{ $filter === 'all' ? 'bg-primary-light dark:bg-primary-dark text-white rounded-md' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200' }}">
                            All
                        </button>
                        <button @click="$wire.set('filter', 'posts')"
                            class="px-4 py-1.5 font-medium text-sm leading-none cursor-pointer {{ $filter === 'posts' ? 'bg-primary-light dark:bg-primary-dark text-white rounded-md' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200' }}">
                            Posts
                        </button>
                        <button @click="$wire.set('filter', 'tags')"
                            class="px-4 py-1.5 font-medium text-sm leading-none cursor-pointer {{ $filter === 'tags' ? 'bg-primary-light dark:bg-primary-dark text-white rounded-md' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200' }}">
                            Tags
                        </button>
                        <button @click="$wire.set('filter', 'users')"
                            class="px-4 py-1.5 font-medium text-sm leading-none cursor-pointer {{ $filter === 'users' ? 'bg-primary-light dark:bg-primary-dark text-white rounded-md' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200' }}">
                            Users
                        </button>
                    </div>
                @endif

                @if ($results && count($results) > 0)
                    <div class="mt-4 p-2">
                        @foreach ($results as $item)
                            @if ($item['type'] === 'post')
                                <div
                                    class="flex items-center px-6 py-2 gap-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md">
                                    <div
                                        class="p-2 bg-blue-100 dark:bg-blue-900 rounded-md text-blue-600 dark:text-blue-400">
                                        <x-heroicon-o-document-text class="w-5 h-5" />
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ '@' . $item['author'] }}
                                        </p>
                                        <h3 class="font-bold text-gray-900 dark:text-gray-100 truncate">
                                            {{ $item['title'] }}
                                        </h3>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $item['date'] }}
                                        </p>
                                    </div>

                                </div>
                            @endif

                            @if ($item['type'] === 'tag')
                                <div
                                    class="flex items-center px-6 py-2 gap-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md">
                                    <div class="p-2 badge-{{ $item['color'] }} rounded-md">
                                        <x-heroicon-o-hashtag class="w-5 h-5" />
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-900 dark:text-gray-100 truncate">
                                            {{ $item['name'] }}
                                        </h3>
                                    </div>

                                </div>
                            @endif

                            @if ($item['type'] === 'user')
                                <div
                                    class="flex items-center px-6 py-2 gap-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md">
                                    <img src="{{ $item['avatar'] ? asset('storage/' . $item['avatar']) : $item['avatar_temporary'] }}"
                                        alt="{{ $item['name'] }}" class="w-10 h-10 rounded-full">
                                    <div>
                                        <h3 class="font-bold text-gray-900 dark:text-gray-100 truncate">
                                            {{ $item['name'] }}
                                        </h3>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ '@' . $item['username'] }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @elseif (strlen($query) < 1)
                    <div
                        class="flex flex-col items-center justify-center text-center text-gray-400 dark:text-gray-500 py-10 px-6">
                        <x-heroicon-o-magnifying-glass class="w-10 h-10" />
                        <p class="mt-3 text-lg font-medium">Start typing to search...</p>
                        <p class="text-sm">Find posts, tags, and users.</p>
                    </div>
                @else
                    <div
                        class="flex flex-col items-center justify-center text-center text-gray-400 dark:text-gray-500 py-10 px-6">
                        <x-heroicon-o-magnifying-glass class="w-10 h-10" />
                        <p class="mt-3 text-lg font-medium">No results found.</p>
                        <p class="text-sm">Try a different search term.</p>
                    </div>
                @endif
            </div>
        </div>
    </template>
</div>
