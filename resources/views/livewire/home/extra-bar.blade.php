<div class="space-y-4">
    <!-- Popular Tags -->
    <div class="glass-card rounded-xl p-4">
        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">
            #Popular Tags
        </h3>
        <div class="flex flex-wrap gap-2">
            @foreach ($topTags as $tag)
                <a href="#" class="badge badge-{{ $tag->color }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>

    <!-- Top Developers -->
    <div class="glass-card rounded-xl p-4">
        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">
            Top Dashers
        </h3>
        <div class="space-y-4">
            @foreach ($topUsers as $user)
                <div class="flex items-start justify-between space-x-4">
                    <a href="{{ route('users.show', ['username' => $user->username]) }}"
                        class="flex items-center gap-3 min-w-0 group">
                        <img class="h-10 w-10 rounded-full"
                            src="{{ $user->avatar ? asset('storage/' . $user->avatar) : $user->avatar_temporary }}"
                            alt="{{ $user->name }}" />
                        <div class="min-w-0 group-hover:underline">
                            <p
                                class="font-medium text-gray-900 dark:text-gray-100 truncate whitespace-nowrap overflow-hidden">
                                {{ $user->name }}
                            </p>
                            <p
                                class="text-xs text-gray-500 dark:text-gray-400 truncate overflow-hidden whitespace-nowrap">
                                {{ $user->job_title ? $user->job_title : '@' . $user->username }}
                            </p>
                        </div>
                    </a>
                    @auth
                        @if ($user->id !== auth()->user()->id)
                            <button wire:click="toggleFollow({{ $user->id }})"
                                class="ml-auto text-xs px-3 py-1 rounded-md transition-opacity
                                {{ auth()->user()->isFollowing($user) ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600' : 'bg-primary-light dark:bg-primary-dark text-white hover:bg-primary-light/80 dark:hover:bg-primary-dark/80' }}">
                                @if (auth()->user()->isFollowing($user))
                                    Following
                                @else
                                    Follow
                                @endif
                            </button>
                        @else
                            <button
                                class="ml-auto text-xs bg-green-500 dark:bg-green-700 text-white px-3 py-1 rounded-md hover:bg-green-400 dark:hover:bg-green-600 transition-colors">
                                It's You!
                            </button>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="ml-auto text-xs px-3 py-1 rounded-md transition-opacity bg-primary-light dark:bg-primary-dark text-white hover:bg-primary-light/80 dark:hover:bg-primary-dark/80">
                            Follow
                        </a>
                    @endauth

                </div>
            @endforeach
        </div>
    </div>

    <!-- Trending Posts -->
    <div class="glass-card rounded-xl">
        <div class="p-4">
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                Trending Posts
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Check out the latest posts trending on DEV Dash.
            </p>
        </div>

        <hr class="border-gray-200 dark:border-gray-700">
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($topPosts as $post)
                <div class="px-4 py-2 space-y-2">
                    <a href="#" class="hover:underline">
                        <h4 class="font-medium text-gray-900 dark:text-gray-100">{{ $post->title }}</h4>
                    </a>
                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate overflow-hidden whitespace-nowrap">
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
