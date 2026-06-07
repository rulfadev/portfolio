@extends('admin.layouts.app', [
    'title' => 'Inquiries',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Leads</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">Project Inquiries</h2>
            <p class="mt-3 text-slate-400">Kelola pesan dan kebutuhan project dari calon client.</p>
        </div>
    </div>

    <form method="GET"
        class="mb-6 grid gap-4 rounded-[2rem] border border-white/10 bg-white/[0.03] p-5 lg:grid-cols-[1fr_240px_240px_auto]">
        <x-form.input name="search" label="Cari Inquiry" :value="$search ?? ''"
            placeholder="Cari nama, email, nomor, atau pesan..." />

        <x-form.select name="website_type" label="Jenis Website" :selected="$websiteType ?? ''" :options="['' => 'Semua Jenis'] + $websiteTypes" />

        <x-form.select name="status" label="Status" :selected="$status ?? ''" :options="['' => 'Semua Status'] + $statuses" />

        <div class="flex items-end gap-3">
            <button type="submit"
                class="filter-btn w-full bg-blue-600 text-white hover:-translate-y-1 hover:bg-blue-500 lg:w-auto">
                Filter
            </button>

            @if (filled($search ?? '') || filled($status ?? '') || filled($websiteType ?? ''))
                <a href="{{ route('admin.inquiries.index') }}"
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
                        <th class="px-6 py-4">Client</th>
                        <th class="px-6 py-4">Project</th>
                        <th class="px-6 py-4">Message</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse ($inquiries as $inquiry)
                        <tr class="transition hover:bg-white/[0.03]">
                            <td class="px-6 py-5">
                                <p class="font-bold text-white">{{ $inquiry->name }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $inquiry->email ?: '-' }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $inquiry->phone ?: '-' }}</p>
                            </td>

                            <td class="px-6 py-5">
                                <p class="text-sm font-bold text-slate-200">
                                    {{ $websiteTypes[$inquiry->website_type] ?? 'Belum dipilih' }}
                                </p>
                                <p class="mt-1 text-xs text-slate-500">
                                    {{ $inquiry->budget_range ?: 'Budget belum dipilih' }}
                                </p>
                            </td>

                            <td class="px-6 py-5">
                                <p class="line-clamp-2 max-w-xl text-sm leading-6 text-slate-400">
                                    {{ $inquiry->message }}
                                </p>
                            </td>

                            <td class="px-6 py-5">
                                @php
                                    $statusClass = match ($inquiry->status) {
                                        'new' => 'border-blue-400/20 bg-blue-400/10 text-blue-300',
                                        'contacted' => 'border-amber-400/20 bg-amber-400/10 text-amber-300',
                                        'in_progress' => 'border-purple-400/20 bg-purple-400/10 text-purple-300',
                                        'closed' => 'border-emerald-400/20 bg-emerald-400/10 text-emerald-300',
                                        'spam' => 'border-red-400/20 bg-red-400/10 text-red-300',
                                        default => 'border-white/10 bg-white/[0.04] text-slate-300',
                                    };
                                @endphp

                                <span
                                    class="rounded-full border px-3 py-1 text-xs font-black uppercase tracking-widest {{ $statusClass }}">
                                    {{ $statuses[$inquiry->status] ?? $inquiry->status }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-sm text-slate-400">
                                {{ $inquiry->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <x-ui.action-button :href="route('admin.inquiries.show', $inquiry)" variant="view">
                                        Detail
                                    </x-ui.action-button>

                                    <x-ui.delete-form :action="route('admin.inquiries.destroy', $inquiry)" title="Hapus inquiry?"
                                        text="Inquiry calon client ini akan dihapus permanen." />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-sm text-slate-400">
                                Belum ada inquiry masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $inquiries->links() }}
    </div>
@endsection
