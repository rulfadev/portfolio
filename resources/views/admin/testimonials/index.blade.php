@extends('admin.layouts.app', [
    'title' => 'Testimonials',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Manage</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">Testimonials</h2>
            <p class="mt-3 text-slate-400">Kelola feedback client yang tampil di homepage.</p>
        </div>

        <a href="{{ route('admin.testimonials.create') }}"
            class="rounded-full bg-amber-400 px-6 py-3 text-center text-sm font-black text-slate-950 transition hover:-translate-y-1 hover:bg-amber-300">
            Tambah Testimonial
        </a>
    </div>

    <form method="GET"
        class="mb-6 grid gap-4 rounded-[2rem] border border-white/10 bg-white/[0.03] p-5 lg:grid-cols-[1fr_220px_220px_auto]">
        <x-form.input name="search" label="Cari Testimonial" :value="$search ?? ''"
            placeholder="Cari nama, role, company, atau pesan..." />

        <x-form.select name="rating" label="Rating" :selected="$rating ?? ''" :options="[
            '' => 'Semua Rating',
            '5' => '5 Bintang',
            '4' => '4 Bintang',
            '3' => '3 Bintang',
            '2' => '2 Bintang',
            '1' => '1 Bintang',
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

            @if (filled($search ?? '') || filled($status ?? '') || filled($rating ?? ''))
                <a href="{{ route('admin.testimonials.index') }}"
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
                        <th class="px-6 py-4">Message</th>
                        <th class="px-6 py-4">Rating</th>
                        <th class="px-6 py-4">Anonymous</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Urutan</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse ($testimonials as $testimonial)
                        <tr class="transition hover:bg-white/[0.03]">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="flex h-12 w-12 flex-none items-center justify-center rounded-2xl border border-white/10 bg-blue-500/10 text-sm font-black text-blue-200">
                                        {{ strtoupper(substr($testimonial->name ?: 'C', 0, 1)) }}
                                    </div>

                                    <div class="min-w-0">
                                        <p class="truncate font-bold text-white">
                                            {{ $testimonial->name ?: 'Client' }}
                                        </p>

                                        <p class="mt-1 truncate text-xs text-slate-500">
                                            {{ $testimonial->role ?: 'Client' }}
                                            @if ($testimonial->company)
                                                · {{ $testimonial->company }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <p class="line-clamp-2 max-w-xl text-sm leading-6 text-slate-400">
                                    {{ $testimonial->message }}
                                </p>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex gap-0.5 text-amber-300">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span
                                            class="{{ $i <= $testimonial->rating ? 'text-amber-300' : 'text-slate-700' }}">
                                            ★
                                        </span>
                                    @endfor
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                @if ($testimonial->is_anonymous)
                                    <span
                                        class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-xs font-bold text-amber-300">
                                        Ya
                                    </span>
                                @else
                                    <span
                                        class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-xs font-bold text-slate-400">
                                        Tidak
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5">
                                @if ($testimonial->is_active)
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
                                {{ $testimonial->sort_order }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <x-ui.action-button :href="route('admin.testimonials.edit', $testimonial)" variant="edit">
                                        Edit
                                    </x-ui.action-button>

                                    <x-ui.delete-form :action="route('admin.testimonials.destroy', $testimonial)" title="Hapus testimonial?"
                                        text="Testimonial ini akan dihapus dan tidak tampil lagi di website." />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="mx-auto max-w-md">
                                    <div
                                        class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-500/15 text-2xl font-black text-blue-200">
                                        T
                                    </div>

                                    <h3 class="text-xl font-black text-white">
                                        Belum ada testimonial
                                    </h3>

                                    <p class="mt-2 text-sm leading-7 text-slate-400">
                                        Tambahkan feedback client pertama untuk meningkatkan kepercayaan calon client.
                                    </p>

                                    <a href="{{ route('admin.testimonials.create') }}"
                                        class="mt-6 inline-flex rounded-full bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                                        Tambah Testimonial
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
        {{ $testimonials->links() }}
    </div>
@endsection
