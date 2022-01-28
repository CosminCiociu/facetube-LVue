@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-orange-400 text-sm font-medium leading-5  focus:outline-none hover:text-orange-900 focus:border-indigo-700 transition duration-150 ease-in-out header-font-style'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5  hover:text-purple-700 hover:border-purple-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out header-font-style';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
