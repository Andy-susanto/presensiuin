@php
    $brandName = filament()->getBrandName();
    $brandLogo = filament()->getBrandLogo();
@endphp

@if (filled($brandLogo))
    <div class="flex items-center border py-2 px-2 rounded-xl">
        <img src="{{ $brandLogo }}" loading="lazy" alt="{{ $brandName }}"
            {{ $attributes->class(['fi-logo h-10']) }} />
        <div class="px-2">
            <span class="font-bold">{{ $brandName }}</span>
        </div>
    </div>
@else
    <div {{ $attributes->class(['fi-logo text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white']) }}>
        {{ $brandName }}
    </div>
@endif
