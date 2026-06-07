@props([
    'name',
    'label' => null,
    'id' => null,
    'options' => [],
    'selected' => null,
    'placeholder' => 'Pilih opsi',
    'required' => false,
    'disabled' => false,
])

@php
    $id = $id ?? $name . '_' . \Illuminate\Support\Str::random(8);

    $normalizedOptions = collect($options)
        ->map(function ($label, $value) {
            if (is_array($label)) {
                return [
                    'value' => (string) ($label['value'] ?? ''),
                    'label' => (string) ($label['label'] ?? ''),
                ];
            }

            return [
                'value' => is_int($value) ? (string) $label : (string) $value,
                'label' => (string) $label,
            ];
        })
        ->values()
        ->toArray();

    $selectedValue = (string) old($name, $selected ?? '');

    $selectedLabel = collect($normalizedOptions)->firstWhere('value', $selectedValue)['label'] ?? $placeholder;
@endphp

<div x-data="{
    open: false,
    selected: @js($selectedValue),
    selectedLabel: @js($selectedLabel),
    options: @js($normalizedOptions),
    choose(option) {
        this.selected = String(option.value);
        this.selectedLabel = option.label;
        this.open = false;
    }
}" x-on:keydown.escape.window="open = false" class="relative">
    @if ($label)
        <label for="{{ $id }}" class="mb-2 block text-sm font-bold text-slate-200">
            {{ $label }}
            @if ($required)
                <span class="text-red-300">*</span>
            @endif
        </label>
    @endif

    <input type="hidden" id="{{ $id }}" name="{{ $name }}" x-model="selected"
        @disabled($disabled) {{ $attributes->whereStartsWith('wire:model') }}>

    <button type="button" x-on:click="open = !open" @disabled($disabled)
        class="form-field-height group flex w-full items-center justify-between gap-3 rounded-2xl border border-white/10 bg-slate-950/85 px-4 text-left text-sm text-white shadow-inner shadow-black/20 outline-none transition hover:border-blue-400/40 hover:bg-slate-950 focus:border-blue-400 focus:ring-4 focus:ring-blue-600/15 disabled:cursor-not-allowed disabled:opacity-60"
        :class="{ 'border-blue-400 ring-4 ring-blue-600/15': open }">
        <span class="truncate" :class="selected ? 'text-white' : 'text-slate-500'" x-text="selectedLabel"></span>

        <span
            class="flex h-8 w-8 flex-none items-center justify-center rounded-xl bg-white/[0.04] text-slate-400 transition group-hover:bg-white/[0.08] group-hover:text-white"
            :class="{ 'rotate-180 bg-blue-500/15 text-blue-200': open }">
            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </span>
    </button>

    <div x-show="open" x-cloak x-transition.origin.top.left x-on:click.outside="open = false"
        class="absolute left-0 right-0 z-[80] mt-2 overflow-hidden rounded-2xl border border-white/10 bg-slate-950 shadow-2xl shadow-black/50 ring-1 ring-white/5">
        <div class="max-h-72 overflow-y-auto p-2">
            <template x-for="option in options" :key="option.value">
                <button type="button" x-on:click="choose(option)"
                    class="flex w-full items-center justify-between gap-3 rounded-xl px-3 py-2.5 text-left text-sm font-semibold transition hover:bg-blue-500/15 hover:text-blue-100"
                    :class="selected === String(option.value) ? 'bg-blue-500/20 text-blue-100' : 'text-slate-300'">
                    <span class="truncate" x-text="option.label"></span>

                    <svg x-show="selected === String(option.value)" class="h-4 w-4 flex-none text-amber-300"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.704 5.29a1 1 0 010 1.42l-7.25 7.25a1 1 0 01-1.42 0l-3.25-3.25a1 1 0 111.42-1.42l2.54 2.54 6.54-6.54a1 1 0 011.42 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </template>
        </div>
    </div>

    @error($name)
        <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
    @enderror
</div>
