@extends('layouts.public', [
    'seoTitle' => $project->seo_title ?: $project->title . ' - Case Study Project RulfaDev',
    'seoDescription' => $project->seo_description ?: $project->summary,
    'canonicalUrl' => route('projects.show', $project),
    'ogTitle' => $project->seo_title ?: $project->title,
    'ogDescription' => $project->seo_description ?: $project->summary,
    'ogType' => 'article',
    'ogImage' => $project->thumbnail ? asset('storage/' . $project->thumbnail) : null,
])

@section('content')
    @php
        $settings = $siteSettings ?? [];

        $brandName = $settings['brand_name'] ?? 'RulfaDev';
        $email = $settings['business_email'] ?? env('BUSINESS_EMAIL');
        $whatsapp = $settings['business_whatsapp'] ?? env('BUSINESS_WHATSAPP');

        $waText = urlencode(
            'Halo ' . $brandName . ', saya tertarik membuat website seperti project ' . $project->title . '.',
        );
        $waUrl = $whatsapp ? 'https://wa.me/' . $whatsapp . '?text=' . $waText : route('contact');

        $features = collect($project->features ?? [])
            ->filter()
            ->values();
        $techStacks = collect($project->tech_stack ?? [])
            ->filter()
            ->values();
        $gallery = collect($project->gallery ?? [])
            ->filter()
            ->values();
        $relatedProjects = collect($relatedProjects ?? []);

        $status = $project->status ?: 'private';

        $statusStyles = [
            'live' => 'border-emerald-400/20 bg-emerald-400/10 text-emerald-300',
            'demo' => 'border-blue-400/20 bg-blue-400/10 text-blue-300',
            'private' => 'border-amber-400/20 bg-amber-400/10 text-amber-300',
        ];

        $statusClass = $statusStyles[$status] ?? $statusStyles['private'];

        $assetUrl = function (?string $path): ?string {
            if (!$path) {
                return null;
            }

            return \Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])
                ? $path
                : asset('storage/' . $path);
        };

        $thumbnailUrl = $assetUrl($project->thumbnail);

        $clientLabel = $project->is_client_private
            ? 'Private Client'
            : ($project->client_name ?:
            'Internal / Brand Project');

        $caseStudyItems = [
            [
                'label' => 'Problem',
                'title' => 'Tantangan utama project',
                'content' => $project->problem,
                'fallback' =>
                    'Project ini dimulai dari kebutuhan untuk menghadirkan website yang lebih profesional, mudah dipahami, dan sesuai dengan tujuan bisnis atau komunitas.',
            ],
            [
                'label' => 'Solution',
                'title' => 'Solusi yang dibangun',
                'content' => $project->solution,
                'fallback' =>
                    'Solusi dikembangkan dengan pendekatan tampilan modern, struktur halaman yang jelas, pengalaman pengguna yang mudah, serta pondasi teknis yang siap dikembangkan.',
            ],
            [
                'label' => 'Result',
                'title' => 'Hasil dan dampak',
                'content' => $project->result,
                'fallback' =>
                    'Hasil akhirnya adalah website yang lebih rapi, responsif, mudah digunakan, dan lebih siap mendukung kebutuhan digital brand atau bisnis.',
            ],
        ];
    @endphp

    <section class="relative overflow-hidden px-5 pb-16 pt-36 lg:px-8 lg:pt-44">
        <div
            class="pointer-events-none absolute left-1/2 top-28 -z-10 h-96 w-96 -translate-x-1/2 rounded-full bg-blue-600/25 blur-3xl">
        </div>

        <div class="pointer-events-none absolute right-10 top-44 -z-10 h-72 w-72 rounded-full bg-amber-400/10 blur-3xl">
        </div>

        <div class="mx-auto max-w-7xl">
            <a href="{{ route('projects.index') }}"
                class="reveal mb-8 inline-flex items-center text-sm font-bold text-slate-400 transition hover:text-amber-300">
                ← Kembali ke katalog project
            </a>

            <div class="grid gap-10 lg:grid-cols-[1fr_0.72fr] lg:items-end">
                <div class="reveal">
                    <div class="mb-6 flex flex-wrap items-center gap-3">
                        <span class="section-kicker">
                            Case Study
                        </span>

                        <span
                            class="rounded-full border px-4 py-2 text-xs font-black uppercase tracking-[0.2em] {{ $statusClass }}">
                            {{ $status }}
                        </span>

                        @if ($project->is_featured)
                            <span
                                class="rounded-full border border-amber-300/30 bg-amber-300 px-4 py-2 text-xs font-black uppercase tracking-[0.2em] text-slate-950">
                                Featured
                            </span>
                        @endif
                    </div>

                    <h1
                        class="max-w-5xl text-balance text-4xl font-black leading-[1.05] tracking-tight text-white md:text-6xl xl:text-7xl">
                        {{ $project->title }}
                    </h1>

                    <p class="mt-7 max-w-3xl text-base leading-8 text-slate-300 md:text-lg">
                        {{ $project->summary }}
                    </p>

                    <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                        <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn-primary">
                            Buat Website Seperti Ini
                            <span class="ml-2">→</span>
                        </a>

                        @if ($project->demo_url && $status !== 'private')
                            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="btn-secondary">
                                Lihat Demo
                            </a>
                        @else
                            <a href="#case-study" class="btn-secondary">
                                Baca Case Study
                            </a>
                        @endif
                    </div>
                </div>

                <div class="reveal grid grid-cols-2 gap-3">
                    <div class="glass-card rounded-3xl p-5">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">
                            Client
                        </p>
                        <p class="mt-2 truncate text-lg font-black text-white">
                            {{ $clientLabel }}
                        </p>
                    </div>

                    <div class="glass-card rounded-3xl p-5">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">
                            Category
                        </p>
                        <p class="mt-2 truncate text-lg font-black text-white">
                            {{ $project->category ?? 'Web Project' }}
                        </p>
                    </div>

                    <div class="glass-card rounded-3xl p-5">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">
                            Year
                        </p>
                        <p class="mt-2 text-lg font-black text-white">
                            {{ $project->year ?? '-' }}
                        </p>
                    </div>

                    <div class="glass-card rounded-3xl p-5">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">
                            Stack
                        </p>
                        <p class="mt-2 text-lg font-black text-white">
                            {{ $techStacks->count() ?: '-' }} Tools
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-5 pb-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal project-glow premium-card overflow-hidden rounded-[2.5rem]">
                @if ($thumbnailUrl)
                    <img src="{{ $thumbnailUrl }}" alt="{{ $project->title }}" class="max-h-[620px] w-full object-cover">
                @else
                    <div
                        class="flex min-h-[360px] items-end bg-gradient-to-br from-blue-600/35 via-slate-900 to-amber-400/15 p-8 md:min-h-[520px] md:p-12">
                        <div>
                            <p class="text-sm font-black uppercase tracking-[0.28em] text-blue-200">
                                Project Preview
                            </p>

                            <h2 class="mt-6 max-w-4xl text-4xl font-black leading-tight text-white md:text-6xl">
                                {{ $project->title }}
                            </h2>

                            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-300">
                                {{ $project->category ?? 'Professional Web Project' }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id="case-study" class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-12 grid gap-6 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                <div>
                    <div class="section-kicker mb-5">
                        Project Breakdown
                    </div>

                    <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                        Dari masalah, solusi, sampai hasil akhir project.
                    </h2>
                </div>

                <p class="max-w-2xl text-base leading-8 text-slate-400 lg:ml-auto">
                    Bagian ini membantu calon client memahami bagaimana sebuah project dikerjakan,
                    bukan hanya melihat tampilan akhirnya saja.
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                @foreach ($caseStudyItems as $item)
                    <article class="reveal premium-card rounded-[2rem] p-6">
                        <p class="mb-6 text-sm font-black uppercase tracking-[0.25em] text-amber-300">
                            {{ $item['label'] }}
                        </p>

                        <h3 class="text-2xl font-black text-white">
                            {{ $item['title'] }}
                        </h3>

                        <p class="mt-5 text-sm leading-8 text-slate-400">
                            {{ $item['content'] ?: $item['fallback'] }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="px-5 py-20 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="reveal glass-card rounded-[2rem] p-6 md:p-8">
                <div class="section-kicker mb-5">
                    Overview
                </div>

                <h2 class="text-3xl font-black leading-tight text-white md:text-4xl">
                    Ringkasan detail project.
                </h2>

                <p class="mt-5 text-sm leading-8 text-slate-400">
                    {{ $project->description ?: $project->summary }}
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl border border-white/10 bg-white/[0.035] p-5">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">
                            Status
                        </p>
                        <p class="mt-2 text-lg font-black capitalize text-white">
                            {{ $status }}
                        </p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/[0.035] p-5">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">
                            Client
                        </p>
                        <p class="mt-2 truncate text-lg font-black text-white">
                            {{ $clientLabel }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="reveal grid gap-6 md:grid-cols-2">
                <div class="premium-card rounded-[2rem] p-6">
                    <p class="mb-6 text-sm font-black uppercase tracking-[0.25em] text-blue-300">
                        Main Features
                    </p>

                    @if ($features->isNotEmpty())
                        <div class="space-y-3">
                            @foreach ($features as $feature)
                                <div class="flex items-start gap-3 rounded-2xl bg-white/[0.035] p-4 text-sm text-slate-300">
                                    <span class="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-amber-300"></span>
                                    <span>{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm leading-7 text-slate-400">
                            Fitur utama belum ditambahkan. Anda bisa melengkapinya dari dashboard admin agar case study
                            terlihat lebih kuat.
                        </p>
                    @endif
                </div>

                <div class="premium-card rounded-[2rem] p-6">
                    <p class="mb-6 text-sm font-black uppercase tracking-[0.25em] text-blue-300">
                        Tech Stack
                    </p>

                    @if ($techStacks->isNotEmpty())
                        <div class="flex flex-wrap gap-3">
                            @foreach ($techStacks as $tech)
                                <span
                                    class="inline-flex rounded-full border border-white/10 bg-slate-950/60 px-4 py-2 text-sm font-bold text-slate-300">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm leading-7 text-slate-400">
                            Tech stack belum ditambahkan. Anda bisa menambahkan Laravel, Tailwind, MySQL, Next.js, atau
                            teknologi lain dari dashboard.
                        </p>
                    @endif

                    <div class="mt-8 border-t border-white/10 pt-6">
                        <p class="text-sm leading-7 text-slate-400">
                            Stack dipilih berdasarkan kebutuhan project, mulai dari performa, kemudahan maintenance,
                            sampai fleksibilitas pengembangan fitur di masa depan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($gallery->isNotEmpty())
        <section class="px-5 py-20 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="reveal mb-12 grid gap-6 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                    <div>
                        <div class="section-kicker mb-5">
                            Gallery
                        </div>

                        <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                            Tampilan visual dari project.
                        </h2>
                    </div>

                    <p class="max-w-2xl text-base leading-8 text-slate-400 lg:ml-auto">
                        Gallery dapat digunakan untuk menampilkan screenshot halaman utama, dashboard admin,
                        tampilan mobile, atau flow fitur tertentu.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    @foreach ($gallery as $image)
                        @php
                            $imageUrl = $assetUrl($image);
                        @endphp

                        <article class="reveal project-glow premium-card overflow-hidden rounded-[2rem]">
                            <img src="{{ $imageUrl }}" alt="{{ $project->title }} screenshot {{ $loop->iteration }}"
                                class="aspect-video w-full object-cover transition duration-500 hover:scale-105">
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div
                class="reveal relative overflow-hidden rounded-[2.5rem] border border-white/10 bg-gradient-to-br from-blue-600/25 via-slate-900 to-amber-400/15 p-8 md:p-12">
                <div class="pointer-events-none absolute right-0 top-0 h-72 w-72 rounded-full bg-white/10 blur-3xl">
                </div>

                <div class="relative grid gap-8 lg:grid-cols-[1fr_0.75fr] lg:items-center">
                    <div>
                        <p class="mb-4 text-sm font-black uppercase tracking-[0.28em] text-amber-200">
                            Build Similar Project
                        </p>

                        <h2 class="max-w-3xl text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                            Ingin membuat website dengan konsep seperti project ini?
                        </h2>

                        <p class="mt-5 max-w-2xl text-base leading-8 text-slate-300">
                            Ceritakan kebutuhan website Anda. Mulai dari jenis website, fitur utama,
                            referensi tampilan, sampai target pengguna. Konsultasi awal bisa dilakukan lewat WhatsApp
                            bisnis.
                        </p>
                    </div>

                    <div class="glass-card rounded-[2rem] p-6">
                        <p class="text-sm font-black uppercase tracking-[0.25em] text-blue-300">
                            Project Inquiry
                        </p>

                        <div class="mt-6 space-y-4">
                            <a href="{{ $waUrl }}" target="_blank" rel="noopener"
                                class="btn-primary w-full gap-2" aria-label="Konsultasi via WhatsApp">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                                <span>Konsultasi</span>
                            </a>

                            <a href="mailto:{{ $email }}" class="btn-secondary w-full">
                                Kirim Email
                            </a>

                            @if ($project->demo_url && $status !== 'private')
                                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener"
                                    class="btn-secondary w-full">
                                    Lihat Demo Project
                                </a>
                            @endif

                            @if ($project->repo_url && $status !== 'private')
                                <a href="{{ $project->repo_url }}" target="_blank" rel="noopener"
                                    class="btn-secondary w-full">
                                    Lihat Repository
                                </a>
                            @endif
                        </div>

                        <p class="mt-5 text-xs leading-6 text-slate-500">
                            Untuk private project, detail client dan URL project dapat disamarkan demi menjaga privasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($relatedProjects->isNotEmpty())
        <section class="px-5 pb-20 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="reveal mb-10 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                    <div>
                        <div class="section-kicker mb-5">
                            Related Work
                        </div>

                        <h2 class="text-3xl font-black text-white md:text-4xl">
                            Project lain yang relevan.
                        </h2>
                    </div>

                    <a href="{{ route('projects.index') }}" class="btn-secondary">
                        Semua Project
                    </a>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($relatedProjects as $related)
                        @php
                            $relatedTech = array_slice($related->tech_stack ?? [], 0, 3);
                        @endphp

                        <article
                            class="reveal project-glow premium-card overflow-hidden rounded-[2rem] transition duration-300 hover:-translate-y-2">
                            <div
                                class="flex aspect-[16/10] items-center justify-center bg-gradient-to-br from-blue-600/25 via-slate-900 to-amber-400/10 p-6 text-center">
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-blue-200">
                                        {{ $related->category ?? 'Project' }}
                                    </p>

                                    <h3 class="mt-4 text-2xl font-black text-white">
                                        {{ $related->title }}
                                    </h3>
                                </div>
                            </div>

                            <div class="p-6">
                                <p class="text-sm leading-7 text-slate-400">
                                    {{ $related->summary }}
                                </p>

                                @if (!empty($relatedTech))
                                    <div class="mt-5 flex flex-wrap gap-2">
                                        @foreach ($relatedTech as $tech)
                                            <span
                                                class="rounded-full bg-white/[0.06] px-3 py-1 text-xs font-bold text-slate-300">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <a href="{{ route('projects.show', $related) }}"
                                    class="mt-6 inline-flex text-sm font-black text-amber-300 hover:text-amber-200">
                                    Baca Case Study →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CreativeWork',
    'name' => $project->title,
    'description' => $project->summary,
    'url' => route('projects.show', $project),
    'image' => $project->thumbnail ? asset('storage/' . $project->thumbnail) : null,
    'dateCreated' => $project->year ? (string) $project->year : optional($project->created_at)->toDateString(),
    'creator' => [
        '@type' => 'Organization',
        'name' => $brandName ?? 'RulfaDev',
        'url' => url('/'),
    ],
    'keywords' => collect($project->tech_stack ?? [])->implode(', '),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
