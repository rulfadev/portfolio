@extends('admin.layouts.app', [
    'title' => 'Dashboard',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">
                Overview
            </p>

            <h2 class="text-3xl font-black text-white md:text-4xl">
                Dashboard Portfolio
            </h2>

            <p class="mt-3 max-w-2xl text-slate-400">
                Pantau project, layanan, brand, testimonial, inquiry client, dan review link dari satu tempat.
            </p>
        </div>

        <a href="{{ route('home') }}" target="_blank" rel="noopener"
            class="rounded-full border border-white/10 px-6 py-3 text-center text-sm font-bold text-white transition hover:bg-white/10">
            Lihat Website
        </a>
    </div>

    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
        <a href="{{ route('admin.projects.index') }}"
            class="glass-card group rounded-3xl p-6 transition hover:-translate-y-1 hover:border-blue-400/30">
            <div class="mb-5 flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-300">
                    <i class="fa-solid fa-layer-group"></i>
                </div>

                <span class="text-sm font-black text-slate-500 transition group-hover:text-blue-300">
                    →
                </span>
            </div>

            <p class="text-sm text-slate-400">Total Project</p>
            <p class="mt-3 text-4xl font-black text-white">{{ $totalProjects }}</p>
            <p class="mt-2 text-xs text-slate-500">
                {{ $activeProjects }} aktif · {{ $featuredProjects }} featured
            </p>
        </a>

        <a href="{{ route('admin.inquiries.index') }}"
            class="glass-card group rounded-3xl p-6 transition hover:-translate-y-1 hover:border-amber-400/30">
            <div class="mb-5 flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-400/15 text-amber-300">
                    <i class="fa-solid fa-inbox"></i>
                </div>

                <span class="text-sm font-black text-slate-500 transition group-hover:text-amber-300">
                    →
                </span>
            </div>

            <p class="text-sm text-slate-400">Project Inquiry</p>
            <p class="mt-3 text-4xl font-black text-white">{{ $totalInquiries }}</p>
            <p class="mt-2 text-xs text-slate-500">
                {{ $newInquiries }} baru · {{ $inProgressInquiries }} proses
            </p>
        </a>

        <a href="{{ route('admin.review-links.index') }}"
            class="glass-card group rounded-3xl p-6 transition hover:-translate-y-1 hover:border-emerald-400/30">
            <div class="mb-5 flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-400/15 text-emerald-300">
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>

                <span class="text-sm font-black text-slate-500 transition group-hover:text-emerald-300">
                    →
                </span>
            </div>

            <p class="text-sm text-slate-400">Client Review</p>
            <p class="mt-3 text-4xl font-black text-white">{{ $totalClientReviews }}</p>
            <p class="mt-2 text-xs text-slate-500">
                {{ $publishedClientReviews }} boleh tampil · {{ $activeReviewLinks }} link aktif
            </p>
        </a>

        <a href="{{ route('admin.brands.index') }}"
            class="glass-card group rounded-3xl p-6 transition hover:-translate-y-1 hover:border-purple-400/30">
            <div class="mb-5 flex items-center justify-between">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-purple-400/15 text-purple-300">
                    <i class="fa-solid fa-handshake"></i>
                </div>

                <span class="text-sm font-black text-slate-500 transition group-hover:text-purple-300">
                    →
                </span>
            </div>

            <p class="text-sm text-slate-400">Brand / Collaborator</p>
            <p class="mt-3 text-4xl font-black text-white">{{ $totalBrands }}</p>
            <p class="mt-2 text-xs text-slate-500">
                {{ $activeBrands }} aktif
            </p>
        </a>
    </div>

    <div class="mt-8 grid gap-6 xl:grid-cols-3">
        <section class="glass-card rounded-[2rem] p-6 xl:col-span-2">
            <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-center">
                <div>
                    <h3 class="text-xl font-black text-white">Inquiry Terbaru</h3>
                    <p class="mt-1 text-sm text-slate-400">
                        Calon client yang baru mengirim kebutuhan project.
                    </p>
                </div>

                <a href="{{ route('admin.inquiries.index') }}"
                    class="rounded-full border border-white/10 px-5 py-2 text-sm font-bold text-white transition hover:bg-white/10">
                    Semua Inquiry
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px] text-left">
                    <thead>
                        <tr class="border-b border-white/10 text-xs uppercase tracking-widest text-slate-500">
                            <th class="py-3">Client</th>
                            <th class="py-3">Project</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Tanggal</th>
                            <th class="py-3 text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/10">
                        @forelse ($latestInquiries as $inquiry)
                            <tr>
                                <td class="py-4">
                                    <p class="font-bold text-white">{{ $inquiry->name }}</p>
                                    <p class="mt-1 text-xs text-slate-500">
                                        {{ $inquiry->email ?: $inquiry->phone ?: '-' }}
                                    </p>
                                </td>

                                <td class="py-4 text-sm text-slate-300">
                                    {{ str_replace('_', ' ', $inquiry->website_type ?: 'Belum dipilih') }}
                                </td>

                                <td class="py-4">
                                    @php
                                        $inquiryStatusClass = match ($inquiry->status) {
                                            'new' => 'border-blue-400/20 bg-blue-400/10 text-blue-300',
                                            'contacted' => 'border-amber-400/20 bg-amber-400/10 text-amber-300',
                                            'in_progress' => 'border-purple-400/20 bg-purple-400/10 text-purple-300',
                                            'closed' => 'border-emerald-400/20 bg-emerald-400/10 text-emerald-300',
                                            'spam' => 'border-red-400/20 bg-red-400/10 text-red-300',
                                            default => 'border-white/10 bg-white/[0.04] text-slate-300',
                                        };
                                    @endphp

                                    <span
                                        class="rounded-full border px-3 py-1 text-xs font-bold capitalize {{ $inquiryStatusClass }}">
                                        {{ str_replace('_', ' ', $inquiry->status) }}
                                    </span>
                                </td>

                                <td class="py-4 text-sm text-slate-400">
                                    {{ $inquiry->created_at->format('d M Y') }}
                                </td>

                                <td class="py-4 text-right">
                                    <a href="{{ route('admin.inquiries.show', $inquiry) }}"
                                        class="text-sm font-black text-amber-300 hover:text-amber-200">
                                        Detail →
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-10 text-center text-sm text-slate-400">
                                    Belum ada inquiry masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <div class="mb-6">
                <h3 class="text-xl font-black text-white">Quick Actions</h3>
                <p class="mt-1 text-sm text-slate-400">
                    Shortcut untuk mengelola konten.
                </p>
            </div>

            <div class="grid gap-3">
                <a href="{{ route('admin.projects.create') }}"
                    class="rounded-2xl border border-white/10 bg-white/[0.035] px-5 py-4 text-sm font-bold text-slate-200 transition hover:bg-white/[0.07] hover:text-white">
                    <i class="fa-solid fa-plus mr-2 text-amber-300"></i>
                    Tambah Project
                </a>

                <a href="{{ route('admin.services.create') }}"
                    class="rounded-2xl border border-white/10 bg-white/[0.035] px-5 py-4 text-sm font-bold text-slate-200 transition hover:bg-white/[0.07] hover:text-white">
                    <i class="fa-solid fa-screwdriver-wrench mr-2 text-blue-300"></i>
                    Tambah Service
                </a>

                <a href="{{ route('admin.brands.create') }}"
                    class="rounded-2xl border border-white/10 bg-white/[0.035] px-5 py-4 text-sm font-bold text-slate-200 transition hover:bg-white/[0.07] hover:text-white">
                    <i class="fa-solid fa-handshake mr-2 text-purple-300"></i>
                    Tambah Brand
                </a>

                <a href="{{ route('admin.testimonials.create') }}"
                    class="rounded-2xl border border-white/10 bg-white/[0.035] px-5 py-4 text-sm font-bold text-slate-200 transition hover:bg-white/[0.07] hover:text-white">
                    <i class="fa-solid fa-comment-dots mr-2 text-emerald-300"></i>
                    Tambah Testimonial
                </a>

                <a href="{{ route('admin.review-links.create') }}"
                    class="rounded-2xl border border-white/10 bg-white/[0.035] px-5 py-4 text-sm font-bold text-slate-200 transition hover:bg-white/[0.07] hover:text-white">
                    <i class="fa-solid fa-link mr-2 text-amber-300"></i>
                    Buat Review Link
                </a>

                <a href="{{ route('admin.settings.edit') }}"
                    class="rounded-2xl border border-white/10 bg-white/[0.035] px-5 py-4 text-sm font-bold text-slate-200 transition hover:bg-white/[0.07] hover:text-white">
                    <i class="fa-solid fa-gear mr-2 text-slate-300"></i>
                    Site Settings
                </a>
            </div>
        </section>
    </div>

    <div class="mt-8 grid gap-6 xl:grid-cols-2">
        <section class="glass-card rounded-[2rem] p-6">
            <div class="mb-6 flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-xl font-black text-white">Project Terbaru</h3>
                    <p class="mt-1 text-sm text-slate-400">
                        Project yang terakhir ditambahkan.
                    </p>
                </div>

                <a href="{{ route('admin.projects.index') }}"
                    class="rounded-full border border-white/10 px-5 py-2 text-sm font-bold text-white transition hover:bg-white/10">
                    Semua
                </a>
            </div>

            <div class="space-y-4">
                @forelse ($latestProjects as $project)
                    <div class="flex items-center gap-4 rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <div class="h-14 w-20 flex-none overflow-hidden rounded-2xl bg-slate-950">
                            @if ($project->thumbnail)
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                    class="h-full w-full object-cover">
                            @else
                                <div
                                    class="flex h-full w-full items-center justify-center bg-blue-500/10 text-xs font-black text-blue-300">
                                    IMG
                                </div>
                            @endif
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="truncate font-bold text-white">{{ $project->title }}</p>
                            <p class="mt-1 truncate text-xs text-slate-500">{{ $project->category ?? 'Project' }}</p>
                        </div>

                        <a href="{{ route('admin.projects.edit', $project) }}"
                            class="text-sm font-black text-amber-300 hover:text-amber-200">
                            Edit
                        </a>
                    </div>
                @empty
                    <p class="text-sm text-slate-400">Belum ada project.</p>
                @endforelse
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <div class="mb-6 flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-xl font-black text-white">Review Link Terbaru</h3>
                    <p class="mt-1 text-sm text-slate-400">
                        Link penilaian yang terakhir dibuat.
                    </p>
                </div>

                <a href="{{ route('admin.review-links.index') }}"
                    class="rounded-full border border-white/10 px-5 py-2 text-sm font-bold text-white transition hover:bg-white/10">
                    Semua
                </a>
            </div>

            <div class="space-y-4">
                @forelse ($latestReviewLinks as $reviewLink)
                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <div class="mb-3 flex items-center justify-between gap-3">
                            <div class="min-w-0">
                                <p class="truncate font-bold text-white">{{ $reviewLink->client_name }}</p>
                                <p class="mt-1 truncate text-xs text-slate-500">
                                    {{ $reviewLink->project?->title ?? 'Tidak terkait project' }}
                                </p>
                            </div>

                            @if ($reviewLink->review)
                                <span
                                    class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-bold text-emerald-300">
                                    Sudah
                                </span>
                            @else
                                <span
                                    class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-xs font-bold text-amber-300">
                                    Belum
                                </span>
                            @endif
                        </div>

                        <a href="{{ route('admin.review-links.show', $reviewLink) }}"
                            class="text-sm font-black text-amber-300 hover:text-amber-200">
                            Detail Review Link →
                        </a>
                    </div>
                @empty
                    <p class="text-sm text-slate-400">Belum ada review link.</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
