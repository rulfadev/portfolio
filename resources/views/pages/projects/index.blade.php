@extends('layouts.public', [
    'seoTitle' => 'Portfolio Project & Case Study - RulfaDev',
    'seoDescription' => 'Lihat katalog project dan case study pembuatan website RulfaDev, mulai dari company profile, landing page, ecommerce, hingga custom web application.',
    'canonicalUrl' => route('projects.index'),
    'ogType' => 'website',
])

@section('content')
    @php
        $settings = $siteSettings ?? [];

        $brandName = $settings['brand_name'] ?? 'RulfaDev';
        $whatsapp = $settings['business_whatsapp'] ?? env('BUSINESS_WHATSAPP');

        $waText = urlencode('Halo ' . $brandName . ', saya ingin konsultasi setelah melihat portfolio project.');
        $waUrl = $whatsapp ? 'https://wa.me/' . $whatsapp . '?text=' . $waText : route('contact');

        $categories = collect($categories ?? []);
        $search = $search ?? request('search');
        $category = $category ?? request('category');

        $hasFilter = filled($search) || filled($category);

        $categoryOptions =
            ['' => 'Semua kategori'] +
            $categories->mapWithKeys(fn($item) => [(string) $item => (string) $item])->toArray();

        $statusStyles = [
            'live' => 'border-emerald-400/20 bg-emerald-400/10 text-emerald-300',
            'demo' => 'border-blue-400/20 bg-blue-400/10 text-blue-300',
            'private' => 'border-amber-400/20 bg-amber-400/10 text-amber-300',
        ];
    @endphp

    <section class="relative overflow-hidden px-5 pb-12 pt-36 lg:px-8 lg:pt-44">
        <div
            class="pointer-events-none absolute left-1/2 top-28 -z-10 h-96 w-96 -translate-x-1/2 rounded-full bg-blue-600/25 blur-3xl">
        </div>

        <div class="pointer-events-none absolute right-10 top-40 -z-10 h-72 w-72 rounded-full bg-amber-400/10 blur-3xl">
        </div>

        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.78fr] lg:items-end">
                <div class="reveal">
                    <div class="section-kicker mb-6">
                        Case Study Catalog
                    </div>

                    <h1
                        class="max-w-5xl text-balance text-4xl font-black leading-[1.05] tracking-tight text-white md:text-6xl xl:text-7xl">
                        Katalog project website yang dirancang untuk kebutuhan nyata.
                    </h1>

                    <p class="mt-7 max-w-3xl text-base leading-8 text-slate-300 md:text-lg">
                        Lihat beberapa project, pendekatan solusi, fitur utama, dan teknologi yang digunakan.
                        Setiap project ditampilkan sebagai case study agar calon client lebih mudah memahami kualitas kerja.
                    </p>

                    <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                        <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn-primary">
                            Konsultasi Project
                            <span class="ml-2">→</span>
                        </a>

                        <a href="{{ route('home') }}#packages" class="btn-secondary">
                            Lihat Solusi Website
                        </a>
                    </div>
                </div>

                <div class="reveal grid grid-cols-3 gap-3">
                    <div class="glass-card rounded-3xl p-4 sm:p-5">
                        <p class="text-2xl font-black text-white md:text-3xl">
                            {{ number_format($totalProjects ?? $projects->total()) }}+
                        </p>
                        <p class="mt-1 text-xs leading-5 text-slate-400">
                            Total Project
                        </p>
                    </div>

                    <div class="glass-card rounded-3xl p-4 sm:p-5">
                        <p class="text-2xl font-black text-white md:text-3xl">
                            {{ number_format($featuredProjectsCount ?? 0) }}+
                        </p>
                        <p class="mt-1 text-xs leading-5 text-slate-400">
                            Featured Work
                        </p>
                    </div>

                    <div class="glass-card rounded-3xl p-4 sm:p-5">
                        <p class="text-2xl font-black text-white md:text-3xl">
                            {{ number_format($categories->count()) }}+
                        </p>
                        <p class="mt-1 text-xs leading-5 text-slate-400">
                            Kategori
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative z-30 px-5 py-8 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <form action="{{ route('projects.index') }}" method="GET"
                class="reveal rounded-[2rem] border border-white/10 bg-white/[0.035] p-4 shadow-2xl shadow-black/20 backdrop-blur-xl md:p-5">
                <div class="grid gap-4 lg:grid-cols-[minmax(0,1fr)_280px_auto] lg:items-end">
                    <x-form.input name="search" label="Cari project" :value="$search"
                        placeholder="Cari nama project, teknologi, kategori..." />

                    <x-form.select name="category" label="Kategori" :selected="$category" :options="$categoryOptions" />

                    <div class="flex flex-col gap-3 sm:flex-row lg:justify-end">
                        <button type="submit"
                            class="filter-btn w-full bg-blue-600 text-white hover:-translate-y-1 hover:bg-blue-500 lg:w-auto">
                            Filter
                        </button>

                        @if ($hasFilter)
                            <a href="{{ route('projects.index') }}"
                                class="filter-btn w-full border border-white/10 text-white hover:bg-white/10 lg:w-auto">
                                Reset
                            </a>
                        @endif
                    </div>
                </div>

                @if ($hasFilter)
                    <div class="mt-5 flex flex-wrap gap-2 border-t border-white/10 pt-5">
                        @if (filled($search))
                            <span
                                class="inline-flex rounded-full border border-blue-400/20 bg-blue-400/10 px-4 py-2 text-xs font-bold text-blue-200">
                                Search: {{ $search }}
                            </span>
                        @endif

                        @if (filled($category))
                            <span
                                class="inline-flex rounded-full border border-amber-400/20 bg-amber-400/10 px-4 py-2 text-xs font-bold text-amber-200">
                                Category: {{ $category }}
                            </span>
                        @endif
                    </div>
                @endif
            </form>
        </div>
    </section>

    <section class="px-5 pb-20 pt-10 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
                <div>
                    <p class="mb-2 text-sm font-black uppercase tracking-[0.28em] text-blue-300">
                        Project Results
                    </p>

                    <h2 class="text-3xl font-black text-white md:text-4xl">
                        {{ number_format($projects->total()) }} case study ditemukan
                    </h2>
                </div>

                <p class="max-w-xl text-sm leading-7 text-slate-400 md:text-right">
                    Project dapat berupa website publik, demo, atau private project. Untuk private project,
                    detail client dapat disamarkan demi menjaga privasi.
                </p>
            </div>

            @if ($projects->isNotEmpty())
                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($projects as $project)
                        @php
                            $status = $project->status ?: 'private';
                            $statusClass = $statusStyles[$status] ?? $statusStyles['private'];
                            $techStacks = array_slice($project->tech_stack ?? [], 0, 4);
                        @endphp

                        <article
                            class="reveal project-glow premium-card group overflow-hidden rounded-[2.25rem] transition duration-300 hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                @if ($project->thumbnail)
                                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                        class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105">
                                @else
                                    <div
                                        class="flex aspect-[16/10] items-center justify-center bg-gradient-to-br from-blue-600/30 via-slate-900 to-amber-400/15 p-6 text-center">
                                        <div>
                                            <p class="text-xs font-bold uppercase tracking-[0.28em] text-blue-200">
                                                {{ $project->category ?? 'Project' }}
                                            </p>

                                            <h3 class="mt-4 text-2xl font-black text-white">
                                                {{ $project->title }}
                                            </h3>
                                        </div>
                                    </div>
                                @endif

                                <div class="absolute left-4 top-4 flex flex-wrap gap-2">
                                    <span
                                        class="rounded-full border px-3 py-1 text-xs font-black uppercase tracking-[0.18em] {{ $statusClass }}">
                                        {{ $status }}
                                    </span>

                                    @if ($project->is_featured)
                                        <span
                                            class="rounded-full border border-amber-300/30 bg-amber-300 px-3 py-1 text-xs font-black uppercase tracking-[0.18em] text-slate-950">
                                            Featured
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="mb-4 flex items-center justify-between gap-3">
                                    <span
                                        class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-xs font-bold text-slate-400">
                                        {{ $project->category ?? 'Web Project' }}
                                    </span>

                                    <span class="text-xs font-bold text-slate-500">
                                        {{ $project->year ?? 'Case Study' }}
                                    </span>
                                </div>

                                <h3 class="text-2xl font-black leading-tight text-white">
                                    {{ $project->title }}
                                </h3>

                                <p class="mt-4 line-clamp-3 text-sm leading-7 text-slate-400">
                                    {{ $project->summary }}
                                </p>

                                @if (!empty($techStacks))
                                    <div class="mt-5 flex flex-wrap gap-2">
                                        @foreach ($techStacks as $tech)
                                            <span
                                                class="rounded-full border border-white/10 bg-slate-950/60 px-3 py-1 text-xs font-bold text-slate-300">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="mt-6 grid grid-cols-3 gap-3 border-t border-white/10 pt-5">
                                    <div>
                                        <p class="text-[11px] uppercase tracking-widest text-slate-500">
                                            Client
                                        </p>
                                        <p class="mt-1 truncate text-sm font-bold text-slate-200">
                                            {{ $project->is_client_private ? 'Private' : $project->client_name ?? 'Internal' }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-[11px] uppercase tracking-widest text-slate-500">
                                            Type
                                        </p>
                                        <p class="mt-1 truncate text-sm font-bold text-slate-200">
                                            {{ $project->category ?? '-' }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-[11px] uppercase tracking-widest text-slate-500">
                                            Status
                                        </p>
                                        <p class="mt-1 truncate text-sm font-bold capitalize text-slate-200">
                                            {{ $status }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-between gap-4">
                                    <a href="{{ route('projects.show', $project) }}"
                                        class="inline-flex items-center text-sm font-black text-amber-300 transition hover:text-amber-200">
                                        Baca Case Study
                                        <span class="ml-2 transition group-hover:translate-x-1">→</span>
                                    </a>

                                    @if ($project->demo_url && $project->status !== 'private')
                                        <a href="{{ $project->demo_url }}" target="_blank" rel="noopener"
                                            class="text-sm font-bold text-blue-300 transition hover:text-blue-200">
                                            Demo
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="reveal rounded-[2rem] border border-white/10 bg-white/[0.035] p-8 text-center md:p-12">
                    <div
                        class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-3xl bg-blue-500/15 text-2xl font-black text-blue-200">
                        ?
                    </div>

                    <h3 class="text-2xl font-black text-white">
                        Project belum ditemukan
                    </h3>

                    <p class="mx-auto mt-3 max-w-xl text-sm leading-7 text-slate-400">
                        Tidak ada project yang cocok dengan filter saat ini. Coba reset filter atau gunakan kata kunci lain.
                    </p>

                    <a href="{{ route('projects.index') }}"
                        class="mt-6 inline-flex rounded-full bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                        Reset Filter
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="px-5 pb-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div
                class="reveal relative overflow-hidden rounded-[2.5rem] border border-white/10 bg-gradient-to-br from-blue-600/35 via-slate-900 to-amber-400/20 p-8 shadow-2xl shadow-black/30 md:p-12">
                <div class="pointer-events-none absolute right-0 top-0 h-64 w-64 rounded-full bg-white/10 blur-3xl">
                </div>

                <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="mb-4 text-sm font-black uppercase tracking-[0.28em] text-amber-200">
                            Build Your Website
                        </p>

                        <h2 class="max-w-3xl text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                            Ingin membuat website dengan kualitas seperti project di atas?
                        </h2>

                        <p class="mt-5 max-w-2xl text-base leading-8 text-slate-300">
                            Kirim kebutuhan project Anda, mulai dari jenis website, fitur utama, referensi desain,
                            sampai target pengguna. Konsultasi awal bisa dilakukan melalui WhatsApp bisnis.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn-primary">
                            Konsultasi Sekarang
                        </a>

                        <a href="{{ route('home') }}#packages" class="btn-secondary">
                            Lihat Paket Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
