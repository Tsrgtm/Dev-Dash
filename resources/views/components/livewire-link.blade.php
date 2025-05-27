@props([
    'href' => '#',
    'title' => null,
    'navigate' => false,
    'class' => '',
])

<a href="{{ $href }}" {{ $navigate ? 'wire:navigate' : '' }}
    {{ $attributes->merge(['class' => $class ?: 'text-blue-600 hover:underline']) }}>
    {{ $slot->isNotEmpty() ? $slot : $title }}
</a>
