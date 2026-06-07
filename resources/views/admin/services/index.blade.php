@extends('admin.layouts.app', [
    'title' => 'Services',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Manage</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">Services</h2>
            <p class="mt-3 text-slate-400">Kelola layanan yang tampil di homepage.</p>
        </div>

        <a href="{{ route('admin.services.create') }}"
            class="rounded-full bg-amber-400 px-6 py-3 text-center text-sm font-black text-slate-950 transition hover:-translate-y-1 hover:bg-amber-300">
            Tambah Service
        </a>
    </div>

    <form method="GET"
        class="mb-6 grid gap-4 rounded-[2rem] border border-white/10 bg-white/[0.03] p-5 md:grid-cols-[1fr_240px_auto]">
        <x-form.input name="search" label="Cari Service" :value="$search ?? ''"
            placeholder="Cari judul, slug, atau deskripsi..." />

        <x-form.select name="status" label="Status" :selected="$status ?? ''" :options="[
            '' => 'Semua Status',
            'active' => 'Aktif',
            'inactive' => 'Nonaktif',
        ]" />

        <div class="flex items-end gap-3">
            <button type="submit"
                class="filter-btn w-full bg-blue-600 text-white hover:-translate-y-1 hover:bg-blue-500 md:w-auto">
                Filter
            </button>

            @if (filled($search ?? '') || filled($status ?? ''))
                <a href="{{ route('admin.services.index') }}"
                    class="filter-btn w-full border border-white/10 text-white hover:bg-white/10 md:w-auto">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="glass-card overflow-hidden rounded-[2rem]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left">
                <thead>
                    <tr class="border-b border-white/10 bg-white/[0.03] text-xs uppercase tracking-widest text-slate-500">
                        <th class="px-6 py-4">Service</th>
                        <th class="px-6 py-4">Features</th>
                        <th class="px-6 py-4">Urutan</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse ($services as $service)
                        <tr class="transition hover:bg-white/[0.03]">
                            <td class="px-6 py-5">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="flex h-12 w-12 flex-none items-center justify-center rounded-2xl border border-white/10 bg-blue-500/10 text-sm font-black text-blue-200">
                                        {{ $service->icon ?: strtoupper(substr($service->title, 0, 1)) }}
                                    </div>

                                    <div class="min-w-0">
                                        <p class="font-bold text-white">{{ $service->title }}</p>
                                        <p class="mt-1 text-xs text-slate-500">{{ $service->slug }}</p>
                                        <p class="mt-2 line-clamp-2 max-w-xl text-sm leading-6 text-slate-400">
                                            {{ $service->description }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                @if ($service->features)
                                    <div class="flex flex-wrap gap-2">
                                        @foreach (array_slice($service->features, 0, 3) as $feature)
                                            <span
                                                class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-xs font-bold text-slate-300">
                                                {{ $feature }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-sm text-slate-500">-</span>
                                @endif
                            </td>

                            <td class="px-6 py-5 text-sm text-slate-300">
                                {{ $service->sort_order }}
                            </td>

                            <td class="px-6 py-5">
                                @if ($service->is_active)
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

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <x-ui.action-button :href="route('admin.services.edit', $service)" variant="edit">
                                        Edit
                                    </x-ui.action-button>

                                    <x-ui.delete-form :action="route('admin.projects.destroy', $project)" title="Hapus project?"
                                        text="Project ini akan dihapus dari portfolio dan tidak bisa dikembalikan." />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="mx-auto max-w-md">
                                    <div
                                        class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-500/15 text-2xl font-black text-blue-200">
                                        S
                                    </div>

                                    <h3 class="text-xl font-black text-white">
                                        Belum ada service
                                    </h3>

                                    <p class="mt-2 text-sm leading-7 text-slate-400">
                                        Tambahkan layanan pertama untuk ditampilkan di homepage.
                                    </p>

                                    <a href="{{ route('admin.services.create') }}"
                                        class="mt-6 inline-flex rounded-full bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                                        Tambah Service
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
        {{ $services->links() }}
    </div>
@endsection
