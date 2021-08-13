@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-yellow-300 text-base font-medium text-gray-900 bg-white focus:outline-none focus:text-gray-900 focus:bg-yellow-300 focus:border-yellow-900 transition uppercase'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition uppercase';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
