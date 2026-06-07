@props([
    'variant' => 'default',
    'href' => null,
    'type' => 'button',
])

@php
    $classes =
        [
            'default' => 'border-white/10 bg-white/[0.04] text-slate-300 hover:bg-white/[0.08] hover:text-white',
            'view' => 'border-blue-400/20 bg-blue-400/10 text-blue-300 hover:bg-blue-400/15 hover:text-blue-200',
            'edit' => 'border-amber-400/20 bg-amber-400/10 text-amber-300 hover:bg-amber-400/15 hover:text-amber-200',
            'delete' => 'border-red-400/20 bg-red-400/10 text-red-300 hover:bg-red-400/15 hover:text-red-200',
        ][$variant] ?? 'border-white/10 bg-white/[0.04] text-slate-300 hover:bg-white/[0.08] hover:text-white';

    $baseClass =
        'inline-flex min-h-9 items-center justify-center rounded-full border px-3.5 py-2 text-xs font-black leading-none transition hover:-translate-y-0.5';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClass . ' ' . $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClass . ' ' . $classes]) }}>
        {{ $slot }}
    </button>
@endif
