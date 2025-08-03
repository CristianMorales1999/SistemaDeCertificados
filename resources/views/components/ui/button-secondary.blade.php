@props ([
    'href' => null,

])
@php

 $clases = 'bg-white text-accent-300 py-4 px-8 rounded-xl hover:bg-accent-300 hover:text-white hover:text-accent-300 border border-accent-300 cursor-pointer transition-all duration-300 transform';

 @endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $clases]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $clases]) }}>
        {{ $slot }}
    </button>
@endif
