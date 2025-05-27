@props(['type' => 'text', 'name' => null, 'label' => null, 'no_margin' => false])

<div class="{{ $no_margin ? '' : 'mb-4' }}" x-data="{ show: false }">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input :type="{{ $type === 'password' ? 'show ? \'text\' : \'password\'' : '\'' . $type . '\'' }}"
            name="{{ $name }}" id="{{ $name }}" placeholder="{{ $attributes->get('placeholder', '') }}"
            :class="{ 'pr-12': $type === 'password' }"
            {{ $attributes->merge(['class' => 'w-full px-4 py-2 rounded-lg outline-none focus:border-transparent focus:ring-2 focus:ring-primary-light dark:focus:ring-primary-dark border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200']) }}>

        @if ($type === 'password')
            <button type="button" @click="show = !show"
                class="absolute inset-y-0 right-2 flex items-center text-sm text-gray-500 cursor-pointer hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <span x-text="show ? 'Hide' : 'Show'" class="font-medium"></span>
            </button>
        @endif
    </div>

    @error($name)
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>
