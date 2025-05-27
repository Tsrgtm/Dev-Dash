<div class="space-y-4">
    <div class="relative">
        <div
            class="{{ $user->branding_color ? 'bg-[' . $user->branding_color . ']' : 'bg-primary-light dark:bg-primary-dark' }} w-full h-48 rounded-b-md }}">
        </div>
        <div
            class="p-6 md:p-8 max-w-7xl mx-auto bg-white dark:bg-gray-800 rounded-md -mt-20 border border-gray-200 dark:border-gray-700">
            <div class="flex gap-4 items-center">
                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : $user->avatar_temporary }}"
                    alt="{{ $user->name }}"
                    class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-primary-light dark:border-primary-dark shadow-lg object-cover">
                <div class="flex items-start justify-between w-full">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">{{ $user->name }}
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ '@' . $user->username }}</p>
                        <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm md:text-base max-w-xl">
                            {{ $user->bio ?? 'No bio yet' }}
                        </p>
                    </div>
                    <div>
                        @auth
                            @if ($user->id !== auth()->user()->id)
                                <button wire:click="toggleFollow({{ $user->id }})"
                                    class="px-4 py-2 rounded-md transition duration-200
                                {{ auth()->user()->isFollowing($user) ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600' : 'bg-primary-light dark:bg-primary-dark text-white hover:bg-primary-light/80 dark:hover:bg-primary-dark/80' }}">
                                    @if (auth()->user()->isFollowing($user))
                                        Following
                                    @else
                                        Follow
                                    @endif
                                </button>
                            @else
                                <a href="#"
                                    class="px-4 py-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200">
                                    Edit Profile
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <hr class="border-gray-200 dark:border-gray-700 my-4">

            <div class="flex flex-wrap items-center gap-4 text-sm">
                <div class="text-center sm:text-left">
                    <span class="font-bold text-gray-800">{{ $user->followers->count() }}</span>
                    <span class="text-gray-500">Followers</span>
                </div>
                <div class="text-center sm:text-left">
                    <span class="font-bold text-gray-800">{{ $user->following->count() }}</span>
                    <span class="text-gray-500">Following</span>
                </div>
            </div>

        </div>
    </div>

    <div class="grid grid-cols-4 gap-4 max-w-7xl mx-auto">
        <div
            class="col-span-1 bg-white dark:bg-gray-800 rounded-md shadow overflow-hidden border border-gray-200 dark:border-gray-700 py-2">
            <div class="inline-flex items-center gap-2 p-4">
                <x-heroicon-o-document-text class="w-6 h-6" />
                <span class="font-bold">{{ readable_number($user->posts()->count()) }}</span>
                <span>Posts Written</span>
            </div>
            <div class="inline-flex items-center gap-2 p-4">
                <x-heroicon-o-chat-bubble-left-right class="w-6 h-6" />
                <span class="font-bold">{{ readable_number($user->comments()->count()) }}</span>
                <span>Comments Written</span>
            </div>
            <div class="inline-flex items-center gap-2 p-4">
                <x-heroicon-o-hashtag class="w-6 h-6" />
                <span class="font-bold">{{ readable_number($user->followedTags()->count()) }}</span>
                <span>Tags Followed</span>
            </div>
        </div>
        <div class="col-span-3">
            <div class="bg-white dark:bg-gray-800 rounded-md shadow overflow-hidden">
            </div>
        </div>
    </div>

</div>
