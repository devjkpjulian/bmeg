@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-yellow-400 text-sm font-medium font-extrabold leading-5 text-yellow-300 focus:outline-none focus:border-yellow-700 transition uppercase'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-300 hover:border-yellow-400 focus:outline-none focus:text-white focus:border-yellow-300 transition uppercase';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
