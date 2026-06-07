@extends('admin.layouts.app', [
    'title' => 'Review Links',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Client Review</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">Review Links</h2>
            <p class="mt-3 text-slate-400">Kelola link penilaian khusus client. Admin tidak bisa mengedit isi penilaian
                client.</p>
        </div>

        <a href="{{ route('admin.review-links.create') }}"
            class="rounded-full bg-amber-400 px-6 py-3 text-center text-sm font-black text-slate-950 transition hover:-translate-y-1 hover:bg-amber-300">
            Buat Link Penilaian
        </a>
    </div>

    <form method="GET"
        class="mb-6 grid gap-4 rounded-[2rem] border border-white/10 bg-white/[0.03] p-5 md:grid-cols-[1fr_240px_auto]">
        <x-form.input name="search" label="Cari Review Link" :value="$search ?? ''"
            placeholder="Cari client, email, nomor, atau project..." />

        <x-form.select name="status" label="Status" :selected="$status ?? ''" :options="[
            '' => 'Semua Status',
            'active' => 'Link Aktif',
            'inactive' => 'Link Nonaktif',
            'submitted' => 'Sudah Dinilai',
            'empty' => 'Belum Dinilai',
        ]" />

        <div class="flex items-end gap-3">
            <button type="submit"
                class="filter-btn w-full bg-blue-600 text-white hover:-translate-y-1 hover:bg-blue-500 md:w-auto">
                Filter
            </button>

            @if (filled($search ?? '') || filled($status ?? ''))
                <a href="{{ route('admin.review-links.index') }}"
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
                        <th class="px-6 py-4">Client</th>
                        <th class="px-6 py-4">Project</th>
                        <th class="px-6 py-4">Review</th>
                        <th class="px-6 py-4">Link</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse ($reviewLinks as $reviewLink)
                        <tr class="transition hover:bg-white/[0.03]">
                            <td class="px-6 py-5">
                                <p class="font-bold text-white">{{ $reviewLink->client_name }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $reviewLink->client_email ?: '-' }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $reviewLink->client_phone ?: '-' }}</p>
                            </td>

                            <td class="px-6 py-5 text-sm text-slate-300">
                                {{ $reviewLink->project?->title ?? '-' }}
                            </td>

                            <td class="px-6 py-5">
                                @if ($reviewLink->review)
                                    <div class="flex gap-0.5 text-amber-300">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span
                                                class="{{ $i <= $reviewLink->review->rating ? 'text-amber-300' : 'text-slate-700' }}">
                                                ★
                                            </span>
                                        @endfor
                                    </div>
                                    <p class="mt-1 text-xs text-emerald-300">Sudah dinilai</p>
                                @else
                                    <span
                                        class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-xs font-bold text-amber-300">
                                        Belum dinilai
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5">
                                @if ($reviewLink->can_be_used)
                                    <span
                                        class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-bold text-emerald-300">
                                        Aktif
                                    </span>
                                @else
                                    <span
                                        class="rounded-full border border-red-400/20 bg-red-400/10 px-3 py-1 text-xs font-bold text-red-300">
                                        Tidak Aktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5 text-sm text-slate-400">
                                {{ $reviewLink->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <x-ui.action-button :href="route('admin.review-links.show', $reviewLink)" variant="view">
                                        Detail
                                    </x-ui.action-button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-sm text-slate-400">
                                Belum ada link penilaian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $reviewLinks->links() }}
    </div>
@endsection
