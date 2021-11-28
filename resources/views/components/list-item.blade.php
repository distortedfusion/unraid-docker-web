@if (! is_null($url))
    <a href="{{ $url }}" {{ $attributes->merge(['class' => 'block px-6 py-4 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:rounded']) }}>
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->merge(['class' => 'px-6 py-4 text-gray-500']) }}>
        {{ $slot }}
    </div>
@endif
