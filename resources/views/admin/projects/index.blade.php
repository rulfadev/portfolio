@extends('admin.layouts.app', [
    'title' => 'Projects',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Manage</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">Projects</h2>
            <p class="mt-3 text-slate-400">Kelola project portfolio dan case study.</p>
        </div>

        <a href="{{ route('admin.projects.create') }}"
            class="rounded-full bg-amber-400 px-6 py-3 text-center text-sm font-black text-slate-950 transition hover:-translate-y-1 hover:bg-amber-300">
            Tambah Project
        </a>
    </div>

    <form method="GET"
        class="mb-6 grid gap-4 rounded-[2rem] border border-white/10 bg-white/[0.03] p-5 md:grid-cols-[1fr_240px_auto]">
        <x-form.input name="search" label="Cari Project" :value="$search ?? ''"
            placeholder="Cari judul, kategori, atau ringkasan..." />

        <x-form.select name="status" label="Status" :selected="$status ?? ''" :options="[
            '' => 'Semua Status',
            'private' => 'Private',
            'demo' => 'Demo',
            'live' => 'Live',
        ]" />

        <div class="flex items-end gap-3">
            <button type="submit"
                class="filter-btn w-full bg-blue-600 text-white hover:-translate-y-1 hover:bg-blue-500 md:w-auto">
                Filter
            </button>

            @if (filled($search ?? '') || filled($status ?? ''))
                <a href="{{ route('admin.projects.index') }}"
                    class="filter-btn w-full border border-white/10 text-white hover:bg-white/10 md:w-auto">
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
                        <th class="px-6 py-4">Project</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Featured</th>
                        <th class="px-6 py-4">Aktif</th>
                        <th class="px-6 py-4">Tahun</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse ($projects as $project)
                        <tr class="transition hover:bg-white/[0.03]">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="h-14 w-20 flex-none overflow-hidden rounded-2xl border border-white/10 bg-slate-950">
                                        @if ($project->thumbnail)
                                            <img src="{{ asset('storage/' . $project->thumbnail) }}"
                                                alt="{{ $project->title }}" class="h-full w-full object-cover">
                                        @else
                                            <div
                                                class="flex h-full w-full items-center justify-center bg-gradient-to-br from-blue-600/30 to-amber-400/10 text-xs font-black text-slate-400">
                                                IMG
                                            </div>
                                        @endif
                                    </div>

                                    <div class="min-w-0">
                                        <p class="truncate font-bold text-white">{{ $project->title }}</p>
                                        <p class="mt-1 truncate text-xs text-slate-500">{{ $project->slug }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5 text-sm text-slate-300">
                                {{ $project->category ?? '-' }}
                            </td>

                            <td class="px-6 py-5">
                                @php
                                    $statusClass = match ($project->status) {
                                        'live' => 'border-emerald-400/20 bg-emerald-400/10 text-emerald-300',
                                        'demo' => 'border-blue-400/20 bg-blue-400/10 text-blue-300',
                                        default => 'border-amber-400/20 bg-amber-400/10 text-amber-300',
                                    };
                                @endphp

                                <span
                                    class="rounded-full border px-3 py-1 text-xs font-black uppercase tracking-widest {{ $statusClass }}">
                                    {{ $project->status }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-sm">
                                @if ($project->is_featured)
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

                            <td class="px-6 py-5 text-sm">
                                @if ($project->is_active)
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
                                {{ $project->year ?? '-' }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <x-ui.action-button :href="route('projects.show', $project)" target="_blank" rel="noopener" variant="view">
                                        View
                                    </x-ui.action-button>

                                    <x-ui.action-button :href="route('admin.projects.edit', $project)" variant="edit">
                                        Edit
                                    </x-ui.action-button>

                                    <x-ui.delete-form :action="route('admin.projects.destroy', $project)" title="Hapus project?"
                                        text="Project ini akan dihapus dari portfolio dan tidak bisa dikembalikan." />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="mx-auto max-w-md">
                                    <div
                                        class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-500/15 text-2xl font-black text-blue-200">
                                        P
                                    </div>

                                    <h3 class="text-xl font-black text-white">
                                        Belum ada project
                                    </h3>

                                    <p class="mt-2 text-sm leading-7 text-slate-400">
                                        Tambahkan project pertama untuk mulai menampilkan portfolio dan case study.
                                    </p>

                                    <a href="{{ route('admin.projects.create') }}"
                                        class="mt-6 inline-flex rounded-full bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                                        Tambah Project
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
        {{ $projects->links() }}
    </div>
@endsection
