<div {{ $attributes->class(['w-8 h-8 flex items-center justify-center rounded text-gray-200 dark:text-gray-800', 'bg-gray-400' => is_null($url)]) }}>
    @if (! is_null($url))
        <img src="{{ $url }}" class="object-fill w-full" />
    @else
        <i class="fas {{ $icon }}"></i>
    @endif
</div>
