<div class="fixed top-10 right-4 ml-4 space-y-2 z-99">
    @foreach ($alerts as $index => $alert)
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-300 transform"
            x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-10"
            class="px-4 py-3 border flex items-center justify-between w-auto max-w-sm rounded-lg shadow-lg"
            :class="{
                'bg-green-200 border-green-600 text-green-700 dark:bg-green-800 dark:border-green-400 dark:text-green-300': '{{ $alert['type'] }}'
                === 'success',
                'bg-red-200 border-red-600 text-red-700 dark:bg-red-800 dark:border-red-400 dark:text-red-300': '{{ $alert['type'] }}'
                === 'danger',
                'bg-orange-200 border-orange-600 text-orange-700 dark:bg-orange-800 dark:border-orange-400 dark:text-orange-300': '{{ $alert['type'] }}'
                === 'warning',
                'bg-blue-200 border-blue-600 text-blue-700 dark:bg-blue-800 dark:border-blue-400 dark:text-blue-300': '{{ $alert['type'] }}'
                === 'info',
                'bg-gray-200 border-gray-600 text-gray-700 dark:bg-gray-800 dark:border-gray-400 dark:text-gray-300': '{{ $alert['type'] }}'
                === 'light',
            }"
            x-init="setTimeout(() => show = false, 6000)">
            <!-- Icon -->
            <div class="mr-3">
                @if ($alert['type'] === 'success')
                    <x-heroicon-o-check-circle class="h-6 text-green-600 dark:text-green-300" />
                @elseif ($alert['type'] === 'danger')
                    <x-heroicon-o-exclamation-circle class="h-6 text-red-600 dark:text-red-300" />
                @elseif ($alert['type'] === 'warning')
                    <x-heroicon-o-exclamation-triangle class="h-6 text-orange-600 dark:text-orange-300" />
                @elseif ($alert['type'] === 'info')
                    <x-heroicon-o-information-circle class="h-6 text-blue-600 dark:text-blue-300" />
                @elseif ($alert['type'] === 'light')
                    <x-heroicon-o-bell-alert class="h-6 text-gray-600 dark:text-gray-300" />
                @endif
            </div>

            <!-- Message -->
            <div class="flex-1">
                <p>{{ $alert['message'] }}</p>
            </div>

            <!-- Close Button -->
            <button wire:click="dismissAlert({{ $index }})"
                class="ml-4 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 p-1 hover:bg-gray-200 dark:hover:bg-gray-700 rounded cursor-pointer">
                <x-heroicon-o-x-mark class="w-4 h-4" />
            </button>
        </div>
    @endforeach
    @php
        $alertTypes = ['success', 'error', 'warning', 'info', 'light'];
    @endphp

    @foreach ($alertTypes as $type)
        @if (session()->has($type))
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-300 transform"
                x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-10"
                class="fixed top-10 right-4 ml-4 px-4 py-3 border flex items-center justify-between w-auto max-w-sm rounded-lg shadow-lg"
                :class="{
                    'bg-green-200 border-green-600 text-green-700 dark:bg-green-800 dark:border-green-400 dark:text-green-300': '{{ $type }}'
                    === 'success',
                    'bg-red-200 border-red-600 text-red-700 dark:bg-red-800 dark:border-red-400 dark:text-red-300': '{{ $type }}'
                    === 'error',
                    'bg-orange-200 border-orange-600 text-orange-700 dark:bg-orange-800 dark:border-orange-400 dark:text-orange-300': '{{ $type }}'
                    === 'warning',
                    'bg-blue-200 border-blue-600 text-blue-700 dark:bg-blue-800 dark:border-blue-400 dark:text-blue-300': '{{ $type }}'
                    === 'info',
                    'bg-gray-200 border-gray-600 text-gray-700 dark:bg-gray-800 dark:border-gray-400 dark:text-gray-300': '{{ $type }}'
                    === 'light',
                }"
                x-init="setTimeout(() => show = false, 6000)">
                <!-- Icon -->
                <div class="mr-3">
                    @if ($type === 'success')
                        <x-heroicon-o-check-circle class="h-6 text-green-600 dark:text-green-300" />
                    @elseif ($type === 'error')
                        <x-heroicon-o-exclamation-circle class="h-6 text-red-600 dark:text-red-300" />
                    @elseif ($type === 'warning')
                        <x-heroicon-o-exclamation-triangle class="h-6 text-orange-600 dark:text-orange-300" />
                    @elseif ($type === 'info')
                        <x-heroicon-o-information-circle class="h-6 text-blue-600 dark:text-blue-300" />
                    @elseif ($type === 'light')
                        <x-heroicon-o-bell-alert class="h-6 text-gray-600 dark:text-gray-300" />
                    @endif
                </div>

                <!-- Message -->
                <div class="flex-1">
                    <p>{{ session($type) }}</p>
                </div>

                <!-- Close Button -->
                <button @click="show = false"
                    class="ml-4 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 p-1 hover:bg-gray-200 dark:hover:bg-gray-700 rounded cursor-pointer">
                    <x-heroicon-o-x-mark class="w-4 h-4" />
                </button>
            </div>
        @endif
    @endforeach
</div>
