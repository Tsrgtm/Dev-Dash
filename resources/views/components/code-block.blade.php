@props(['language' => 'javascript', 'classes' => ''])

<div x-data="{ copied: false }" class="relative group {{ $classes }}">
    <button
        @click="navigator.clipboard.writeText($refs.code.innerText).then(() => { copied = true; setTimeout(() => copied = false, 2000) }).catch(() => alert('Failed to copy code'))"
        x-text="copied ? 'Copied!' : 'Copy'"
        class="absolute top-2 right-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-2 py-1 rounded text-xs opacity-0 group-hover:opacity-100 transition-opacity"
        type="button">
    </button>

    <pre class="rounded-md bg-gray-100 dark:bg-gray-800 p-4">
        <code x-ref="code" class="language-{{ $language }} text-sm text-gray-800 dark:text-gray-100 w-full">{{ $slot }}</code>
    </pre>
</div>

@once
    @push('styles')
        <!-- Load Highlight.js default and dark theme styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/highlight.js@11.9.0/styles/default.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/highlight.js@11.9.0/styles/github-dark.min.css"
            media="(prefers-color-scheme: dark)">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/highlight.js@11.9.0/lib/common.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightElement(block);
                });
            });
        </script>
    @endpush
@endonce
