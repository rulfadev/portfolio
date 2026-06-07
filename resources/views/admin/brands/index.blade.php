@extends('admin.layouts.app', [
    'title' => 'Brands',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Manage</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">Brands</h2>
            <p class="mt-3 text-slate-400">Kelola brand, partner, client, dan kolaborasi yang tampil di website.</p>
        </div>

        <a href="{{ route('admin.brands.create') }}"
            class="rounded-full bg-amber-400 px-6 py-3 text-center text-sm font-black text-slate-950 transition hover:-translate-y-1 hover:bg-amber-300">
            Tambah Brand
        </a>
    </div>

    <form method="GET"
        class="mb-6 grid gap-4 rounded-[2rem] border border-white/10 bg-white/[0.03] p-5 lg:grid-cols-[1fr_240px_220px_auto]">
        <x-form.input name="search" label="Cari Brand" :value="$search ?? ''"
            placeholder="Cari nama brand, tipe, atau deskripsi..." />

        <x-form.select name="type" label="Tipe" :selected="$type ?? ''" :options="[
            '' => 'Semua Tipe',
            'collaboration' => 'Collaboration',
            'brand-built' => 'Brand Built',
            'client' => 'Client',
            'internal' => 'Internal',
            'partner' => 'Partner',
        ]" />

        <x-form.select name="status" label="Status" :selected="$status ?? ''" :options="[
            '' => 'Semua Status',
            'active' => 'Aktif',
            'inactive' => 'Nonaktif',
        ]" />

        <div class="flex items-end gap-3">
            <button type="submit"
                class="filter-btn w-full bg-blue-600 text-white hover:-translate-y-1 hover:bg-blue-500 lg:w-auto">
                Filter
            </button>

            @if (filled($search ?? '') || filled($type ?? '') || filled($status ?? ''))
                <a href="{{ route('admin.brands.index') }}"
                    class="filter-btn w-full border border-white/10 text-white hover:bg-white/10 lg:w-auto">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="glass-card overflow-hidden rounded-[2rem]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[980px] text-left">
                <thead>
                    <tr class="border-b border-white/10 bg-white/[0.03] text-xs uppercase tracking-widest text-slate-500">
                        <th class="px-6 py-4">Brand</th>
                        <th class="px-6 py-4">Tipe</th>
                        <th class="px-6 py-4">Website</th>
                        <th class="px-6 py-4">Featured</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Urutan</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse ($brands as $brand)
                        <tr class="transition hover:bg-white/[0.03]">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="flex h-14 w-14 flex-none items-center justify-center overflow-hidden rounded-2xl border border-white/10 bg-slate-950">
                                        @if ($brand->logo)
                                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                                                class="h-full w-full object-cover">
                                        @else
                                            <span class="text-lg font-black text-blue-200">
                                                {{ strtoupper(substr($brand->name, 0, 1)) }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="min-w-0">
                                        <p class="truncate font-bold text-white">{{ $brand->name }}</p>
                                        <p class="mt-1 line-clamp-2 max-w-xl text-sm leading-6 text-slate-400">
                                            {{ $brand->description ?: 'Tidak ada deskripsi.' }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <span
                                    class="rounded-full border border-blue-400/20 bg-blue-400/10 px-3 py-1 text-xs font-bold capitalize text-blue-300">
                                    {{ str_replace('-', ' ', $brand->type) }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                @if ($brand->website)
                                    <a href="{{ $brand->website }}" target="_blank" rel="noopener"
                                        class="text-sm font-bold text-amber-300 hover:text-amber-200">
                                        Visit
                                    </a>
                                @else
                                    <span class="text-sm text-slate-500">-</span>
                                @endif
                            </td>

                            <td class="px-6 py-5">
                                @if ($brand->is_featured)
                                    <span
                                        class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-xs font-bold text-amber-300">
                                        Ya
                                    </span>
                                @else
                                    <span
                                        class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-xs font-bold text-slate-500">
                                        Tidak
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5">
                                @if ($brand->is_active)
                                    <span
                                        class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-bold text-emerald-300">
                                        Aktif
                                    </span>
                                @else
                                    <span
                                        class="rounded-full border border-red-400/20 bg-red-400/10 px-3 py-1 text-xs font-bold text-red-300">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5 text-sm text-slate-300">
                                {{ $brand->sort_order }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <x-ui.action-button :href="route('admin.brands.edit', $brand)" variant="edit">
                                        Edit
                                    </x-ui.action-button>

                                    <x-ui.delete-form :action="route('admin.brands.destroy', $brand)" title="Hapus brand?"
                                        text="Brand ini akan dihapus dari daftar brand dan kolaborasi." />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="mx-auto max-w-md">
                                    <div
                                        class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-500/15 text-2xl font-black text-blue-200">
                                        B
                                    </div>

                                    <h3 class="text-xl font-black text-white">
                                        Belum ada brand
                                    </h3>

                                    <p class="mt-2 text-sm leading-7 text-slate-400">
                                        Tambahkan brand, partner, atau client pertama untuk ditampilkan di website.
                                    </p>

                                    <a href="{{ route('admin.brands.create') }}"
                                        class="mt-6 inline-flex rounded-full bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                                        Tambah Brand
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $brands->links() }}
    </div>
@endsection
