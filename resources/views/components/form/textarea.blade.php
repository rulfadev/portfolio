@props([
    'name',
    'label' => null,
    'id' => null,
    'value' => null,
    'placeholder' => null,
    'rows' => 4,
    'required' => false,
    'disabled' => false,
])

@php
    $id = $id ?? $name;
@endphp

<div>
    @if ($label)
        <label for="{{ $id }}" class="mb-2 block text-sm font-bold text-slate-200">
            {{ $label }}
            @if ($required)
                <span class="text-red-300">*</span>
            @endif
        </label>
    @endif

    <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        @required($required) @disabled($disabled)
        {{ $attributes->merge([
            'class' =>
                'w-full rounded-2xl border border-white/10 bg-slate-950/85 px-4 py-3 text-sm leading-7 text-white shadow-inner shadow-black/20 outline-none transition placeholder:text-slate-600 hover:border-blue-400/40 focus:border-blue-400 focus:ring-4 focus:ring-blue-600/15 disabled:cursor-not-allowed disabled:opacity-60',
        ]) }}>{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
    @enderror
</div>
