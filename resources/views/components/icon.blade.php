<div {{ $attributes->class('w-8 h-8 flex items-center justify-center rounded-sm text-white bg-gray-400') }}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <i class="fas {{ $icon }}"></i>
    @endif
</div>
