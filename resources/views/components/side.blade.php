@props(['active', 'class' => ''])

@php
$classes = ($active ?? false)
            ? 'nav-link active block px-3 py-2 text-base font-medium leading-5 text-gray-900 bg-indigo-100 shadow-lg transition duration-150 ease-in-out ' . $class
            : 'nav-link block px-3 py-2 text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out ' . $class;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>