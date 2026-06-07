@extends('admin.layouts.app', [
    'title' => 'Detail Review Link',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Review Link</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">{{ $reviewLink->client_name }}</h2>
            <p class="mt-3 text-slate-400">
                Admin hanya bisa melihat penilaian. Isi penilaian hanya bisa dibuat atau diedit oleh client melalui link
                ini.
            </p>
        </div>

        <a href="{{ route('admin.review-links.index') }}"
            class="rounded-full border border-white/10 px-6 py-3 text-sm font-bold text-white hover:bg-white/10">
            Kembali
        </a>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        <div class="space-y-6 xl:col-span-2">
            <section class="glass-card rounded-[2rem] p-6">
                <h3 class="mb-5 text-xl font-black text-white">Link Penilaian</h3>

                <div class="rounded-2xl border border-white/10 bg-slate-950/80 p-4">
                    <p class="break-all text-sm font-bold text-blue-200">
                        {{ $reviewLink->review_url }}
                    </p>
                </div>

                <p class="mt-3 text-xs leading-6 text-slate-500">
                    Berikan link ini kepada client. Client dapat mengisi 1 penilaian dan mengeditnya melalui link yang sama.
                </p>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ $reviewLink->review_url }}" target="_blank" rel="noopener" class="btn-secondary">
                        Buka Link
                    </a>

                    <form action="{{ route('admin.review-links.toggle', $reviewLink) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <button type="submit"
                            class="rounded-full border border-white/10 px-6 py-3 text-sm font-bold text-white transition hover:bg-white/10">
                            {{ $reviewLink->is_active ? 'Nonaktifkan Link' : 'Aktifkan Link' }}
                        </button>
                    </form>

                    @if (!$reviewLink->review)
                        <x-ui.delete-form :action="route('admin.review-links.destroy', $reviewLink)" title="Hapus link penilaian?"
                            text="Link yang belum memiliki penilaian akan dihapus permanen." />
                    @endif
                </div>
            </section>

            <section class="glass-card rounded-[2rem] p-6">
                <h3 class="mb-5 text-xl font-black text-white">Penilaian Client</h3>

                @if ($reviewLink->review)
                    <div class="mb-5 flex gap-1 text-amber-300">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= $reviewLink->review->rating ? 'text-amber-300' : 'text-slate-700' }}">
                                ★
                            </span>
                        @endfor
                    </div>

                    <p class="whitespace-pre-line text-sm leading-8 text-slate-300">
                        {{ $reviewLink->review->message }}
                    </p>

                    @if ($reviewLink->review->suggestions)
                        <div class="mt-6 rounded-2xl border border-white/10 bg-white/[0.035] p-5">
                            <p class="mb-2 text-sm font-black text-white">Saran / Masukan</p>
                            <p class="whitespace-pre-line text-sm leading-7 text-slate-400">
                                {{ $reviewLink->review->suggestions }}
                            </p>
                        </div>
                    @endif

                    <div class="mt-6 grid gap-4 md:grid-cols-2">
                        <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Client</p>
                            <p class="mt-2 font-bold text-white">{{ $reviewLink->review->client_name }}</p>
                            <p class="mt-1 text-sm text-slate-400">{{ $reviewLink->review->client_role ?: '-' }}</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Publikasi</p>
                            <p
                                class="mt-2 font-bold {{ $reviewLink->review->consent_to_publish ? 'text-emerald-300' : 'text-amber-300' }}">
                                {{ $reviewLink->review->consent_to_publish ? 'Diizinkan tampil sebagai testimonial' : 'Tidak diizinkan tampil' }}
                            </p>
                        </div>
                    </div>
                @else
                    <p class="text-sm leading-7 text-slate-400">
                        Client belum mengisi penilaian.
                    </p>
                @endif
            </section>
        </div>

        <aside class="space-y-6">
            <section class="glass-card rounded-[2rem] p-6">
                <h3 class="mb-5 text-xl font-black text-white">Informasi Link</h3>

                <div class="space-y-4">
                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Client</p>
                        <p class="mt-2 font-bold text-white">{{ $reviewLink->client_name }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Project</p>
                        <p class="mt-2 font-bold text-white">{{ $reviewLink->project?->title ?? '-' }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Status Link</p>
                        <p class="mt-2 font-bold {{ $reviewLink->can_be_used ? 'text-emerald-300' : 'text-red-300' }}">
                            {{ $reviewLink->can_be_used ? 'Aktif' : 'Tidak Aktif' }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Kedaluwarsa</p>
                        <p class="mt-2 font-bold text-white">
                            {{ $reviewLink->expires_at ? $reviewLink->expires_at->format('d M Y H:i') : 'Tidak ada batas waktu' }}
                        </p>
                    </div>
                </div>
            </section>
        </aside>
    </div>
@endsection
