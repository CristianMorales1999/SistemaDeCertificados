@props ([
    'href' => null,
])

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'bg-accent-300 text-white py-4 px-6 rounded-md hover:bg-primary-600']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'bg-accent-300 text-white py-4 px-6 rounded-md hover:bg-primary-600']) }}>
        {{ $slot }}
    </button>
@endif
