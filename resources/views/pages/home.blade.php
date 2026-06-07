@extends('layouts.public')

@section('content')
    @php
        $settings = $siteSettings ?? [];

        $brandName = $settings['brand_name'] ?? 'RulfaDev';
        $tagline = $settings['brand_tagline'] ?? 'Jasa Pembuatan Website & Custom Web Development';

        $heroTitle =
            $settings['hero_title'] ??
            'Jasa pembuatan website modern untuk bisnis, UMKM, komunitas, dan brand profesional.';

        $heroDescription =
            $settings['hero_description'] ??
            'RulfaDev membantu membangun website company profile, landing page, ecommerce, dan web app custom yang responsif, SEO-friendly, cepat, dan mudah dikelola.';

        $email = $settings['business_email'] ?? env('BUSINESS_EMAIL');
        $whatsapp = $settings['business_whatsapp'] ?? env('BUSINESS_WHATSAPP');

        $waText = urlencode('Halo ' . $brandName . ', saya ingin konsultasi pembuatan website.');
        $waUrl = $whatsapp ? 'https://wa.me/' . $whatsapp . '?text=' . $waText : route('contact');

        $services = collect($services ?? []);
        $featuredProjects = collect($featuredProjects ?? []);
        $brands = collect($brands ?? []);
        $testimonials = collect($testimonials ?? []);
        $displayTestimonials = collect($displayTestimonials ?? ($testimonials ?? []));

        $primaryProject = $featuredProjects->first();

        $websitePackages = $websitePackages ?? [
            [
                'name' => 'Landing Page',
                'label' => 'Promosi Cepat',
                'description' =>
                    'Cocok untuk campaign, promosi produk, personal brand, dan halaman penawaran yang fokus ke konversi.',
                'features' => ['Desain modern dan responsive', 'CTA WhatsApp / email', 'SEO basic', 'Fast loading'],
            ],
            [
                'name' => 'Company Profile',
                'label' => 'Bisnis Profesional',
                'description' =>
                    'Website profil bisnis untuk menampilkan layanan, keunggulan, brand, portfolio, dan informasi kontak.',
                'features' => ['Halaman layanan', 'Profil brand', 'Portfolio / gallery', 'SEO company profile'],
                'highlight' => true,
            ],
            [
                'name' => 'Ecommerce Website',
                'label' => 'Jualan Online',
                'description' =>
                    'Website toko online dengan katalog produk, detail produk, keranjang, dan checkout WhatsApp.',
                'features' => ['Katalog produk', 'Cart dan checkout', 'Admin produk', 'Integrasi WhatsApp'],
            ],
            [
                'name' => 'Custom Web App',
                'label' => 'Sistem Khusus',
                'description' =>
                    'Aplikasi web custom seperti dashboard, sistem keuangan, sistem member, laporan, dan admin panel.',
                'features' => ['Role management', 'Dashboard admin', 'Database design', 'Report system'],
            ],
        ];

        $techStacks = $techStacks ?? [
            'Languages' => ['HTML', 'CSS', 'JavaScript', 'TypeScript', 'PHP'],
            'Frameworks' => ['Laravel', 'React.js', 'Next.js', 'Blade', 'Express.js'],
            'Libraries' => ['Tailwind CSS', 'Bootstrap', 'Axios', 'React Hook Form', 'SweetAlert2'],
            'Database & Backend' => ['MySQL', 'Firebase', 'MongoDB', 'REST API'],
            'Cloud & Deployment' => ['Vercel', 'Netlify', 'GitHub Pages'],
            'Tools & Platforms' => ['Git', 'GitHub', 'Visual Studio Code', 'Figma', 'Postman'],
            'Package Managers & Build Tools' => ['NPM', 'Vite', 'Composer', 'Webpack'],
        ];
    @endphp

    <section class="relative overflow-hidden px-5 pb-20 pt-36 lg:px-8 lg:pb-28 lg:pt-44">
        <div
            class="pointer-events-none absolute left-1/2 top-24 -z-10 h-[34rem] w-[34rem] -translate-x-1/2 rounded-full bg-blue-600/20 blur-3xl">
        </div>
        <div class="pointer-events-none absolute right-0 top-48 -z-10 h-80 w-80 rounded-full bg-amber-400/10 blur-3xl"></div>
        <div class="pointer-events-none absolute left-10 bottom-10 -z-10 h-72 w-72 rounded-full bg-cyan-400/10 blur-3xl">
        </div>

        <div class="mx-auto grid max-w-7xl items-center gap-14 lg:grid-cols-[1.04fr_0.96fr]">
            <div class="reveal">
                <div class="mb-6 flex flex-wrap items-center gap-3">
                    <div class="section-kicker">
                        {{ $tagline }}
                    </div>

                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-emerald-300">
                        <span class="h-2 w-2 rounded-full bg-emerald-300 shadow-[0_0_16px_rgba(110,231,183,0.9)]"></span>
                        Open for Project
                    </span>
                </div>

                <h1
                    class="max-w-5xl text-balance text-4xl font-black leading-[1.05] tracking-tight text-white md:text-6xl xl:text-7xl">
                    <span class="gradient-text">
                        {{ $heroTitle }}
                    </span>
                </h1>

                <p class="mt-7 max-w-2xl text-base leading-8 text-slate-300 md:text-lg">
                    {{ $heroDescription }}
                </p>

                <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn-primary">
                        Konsultasi Project
                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>

                    <a href="#packages" class="btn-secondary">
                        Lihat Solusi Website
                    </a>
                </div>

                <div class="mt-5 flex flex-wrap items-center gap-4 text-sm text-slate-400">
                    <a href="{{ route('projects.index') }}"
                        class="inline-flex items-center gap-2 font-bold transition hover:text-amber-300">
                        Lihat portfolio project
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                    </a>

                    <span class="hidden h-1 w-1 rounded-full bg-slate-600 sm:block"></span>

                    <span class="inline-flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-blue-300"></i>
                        Identitas pribadi tetap aman
                    </span>
                </div>

                <div class="mt-10 grid max-w-2xl grid-cols-3 gap-3 sm:gap-4">
                    <div class="glass-card rounded-3xl p-4 sm:p-5">
                        <div
                            class="mb-3 flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-300">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>

                        <p class="text-2xl font-black text-white md:text-3xl">
                            {{ $featuredProjects->count() }}+
                        </p>

                        <p class="mt-1 text-xs leading-5 text-slate-400">
                            Featured Project
                        </p>
                    </div>

                    <div class="glass-card rounded-3xl p-4 sm:p-5">
                        <div
                            class="mb-3 flex h-10 w-10 items-center justify-center rounded-2xl bg-amber-400/15 text-amber-300">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>

                        <p class="text-2xl font-black text-white md:text-3xl">
                            {{ $services->count() }}+
                        </p>

                        <p class="mt-1 text-xs leading-5 text-slate-400">
                            Layanan Digital
                        </p>
                    </div>

                    <div class="glass-card rounded-3xl p-4 sm:p-5">
                        <div
                            class="mb-3 flex h-10 w-10 items-center justify-center rounded-2xl bg-emerald-400/15 text-emerald-300">
                            <i class="fa-solid fa-handshake"></i>
                        </div>

                        <p class="text-2xl font-black text-white md:text-3xl">
                            {{ $brands->count() }}+
                        </p>

                        <p class="mt-1 text-xs leading-5 text-slate-400">
                            Brand / Partner
                        </p>
                    </div>
                </div>
            </div>

            <div class="reveal relative">
                <div
                    class="absolute -left-5 top-10 hidden rounded-3xl border border-white/10 bg-white/[0.055] p-4 shadow-2xl shadow-black/30 backdrop-blur-xl lg:block float-slow">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-200">
                            <i class="fa-solid fa-magnifying-glass-chart"></i>
                        </span>

                        <div>
                            <p class="text-xs text-slate-400">SEO Ready</p>
                            <p class="mt-1 text-sm font-black text-white">Meta + Schema</p>
                        </div>
                    </div>
                </div>

                <div
                    class="absolute -right-4 bottom-24 hidden rounded-3xl border border-white/10 bg-white/[0.055] p-4 shadow-2xl shadow-black/30 backdrop-blur-xl lg:block float-medium">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-amber-400/15 text-amber-300">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </span>

                        <div>
                            <p class="text-xs text-slate-400">Responsive</p>
                            <p class="mt-1 text-sm font-black text-white">Mobile First</p>
                        </div>
                    </div>
                </div>

                <div class="premium-card rounded-[2.25rem] p-4 md:p-5">
                    <div class="rounded-[1.75rem] border border-white/10 bg-slate-950/75 p-4 md:p-5">
                        <div class="mb-5 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-red-400"></span>
                                <span class="h-3 w-3 rounded-full bg-amber-400"></span>
                                <span class="h-3 w-3 rounded-full bg-emerald-400"></span>
                            </div>

                            <span
                                class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-black text-emerald-300">
                                Available
                            </span>
                        </div>

                        <div
                            class="relative overflow-hidden rounded-[1.5rem] border border-white/10 bg-gradient-to-br from-blue-600/25 via-slate-900 to-amber-400/10 p-5 md:p-6">
                            <div
                                class="pointer-events-none absolute -right-12 -top-12 h-48 w-48 rounded-full bg-blue-500/20 blur-3xl">
                            </div>
                            <div
                                class="pointer-events-none absolute -bottom-16 left-10 h-48 w-48 rounded-full bg-amber-400/10 blur-3xl">
                            </div>

                            <div class="relative">
                                <div class="mb-8 flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-xs font-black uppercase tracking-[0.25em] text-blue-200">
                                            Website Preview
                                        </p>

                                        <p class="mt-2 text-sm text-slate-400">
                                            Professional digital presence
                                        </p>
                                    </div>

                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-white/[0.06] text-amber-300">
                                        <i class="fa-solid fa-code"></i>
                                    </div>
                                </div>

                                <h2 class="text-4xl font-black leading-tight text-white md:text-5xl">
                                    {{ $brandName }}
                                </h2>

                                <p class="mt-4 max-w-md text-sm leading-7 text-slate-300">
                                    Build clean, scalable, and conversion-focused websites for modern brands.
                                </p>

                                <div class="mt-8 grid grid-cols-2 gap-3">
                                    <div class="rounded-3xl border border-white/10 bg-white/[0.06] p-4">
                                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Backend</p>
                                        <p class="mt-2 text-xl font-black text-white">Laravel</p>
                                    </div>

                                    <div class="rounded-3xl border border-white/10 bg-white/[0.06] p-4">
                                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Frontend</p>
                                        <p class="mt-2 text-xl font-black text-white">Tailwind</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 grid gap-3 sm:grid-cols-2">
                            <div class="rounded-3xl border border-white/10 bg-white/[0.04] p-4">
                                <div class="mb-3 flex items-center justify-between text-sm">
                                    <span class="text-slate-300">Performance</span>
                                    <span class="font-bold text-emerald-300">Fast</span>
                                </div>

                                <div class="h-2 rounded-full bg-white/10">
                                    <div class="h-2 w-[92%] rounded-full bg-emerald-400"></div>
                                </div>
                            </div>

                            <div class="rounded-3xl border border-white/10 bg-white/[0.04] p-4">
                                <div class="mb-3 flex items-center justify-between text-sm">
                                    <span class="text-slate-300">Design</span>
                                    <span class="font-bold text-amber-300">Premium</span>
                                </div>

                                <div class="h-2 rounded-full bg-white/10">
                                    <div class="h-2 w-[96%] rounded-full bg-amber-400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="packages" class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-12 grid gap-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <div class="section-kicker mb-5">Website Solutions</div>

                    <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                        Pilihan solusi website
                        untuk kebutuhan bisnis
                        yang berbeda.
                    </h2>
                </div>

                <p class="max-w-2xl text-base leading-8 text-slate-400 lg:ml-auto">
                    Setiap website dirancang agar tampil profesional, mudah digunakan, mobile responsive,
                    dan membantu client lebih percaya pada brand Anda.
                </p>
            </div>

            <div class="grid gap-5 xl:grid-cols-4 md:grid-cols-2">
                @foreach ($websitePackages as $package)
                    @php
                        $isHighlighted = !empty($package['highlight']);
                        $features = $package['features'] ?? [];
                    @endphp

                    <article
                        class="reveal group flex h-full flex-col overflow-hidden rounded-[2rem] border p-6 transition duration-300 hover:-translate-y-2
                    {{ $isHighlighted
                        ? 'border-amber-400/40 bg-gradient-to-br from-amber-400/10 via-blue-600/8 to-slate-950 shadow-[0_20px_60px_rgba(245,158,11,0.10)]'
                        : 'border-white/10 bg-white/[0.035] shadow-2xl shadow-black/20 hover:border-blue-400/25 hover:bg-white/[0.05]' }}">
                        <div class="mb-6 flex items-start justify-between gap-4">
                            <span
                                class="rounded-full border border-white/10 bg-white/[0.04] px-4 py-2 text-[11px] font-black uppercase tracking-[0.24em] text-blue-200">
                                {{ $package['label'] }}
                            </span>

                            @if ($isHighlighted)
                                <span
                                    class="inline-flex flex-none items-center rounded-full bg-amber-400 px-3 py-1.5 text-[11px] font-black text-slate-950 shadow-lg shadow-amber-400/20">
                                    Popular
                                </span>
                            @endif
                        </div>

                        <div class="min-h-[88px]">
                            <h3 class="text-[1.9rem] font-black leading-tight text-white">
                                {{ $package['name'] }}
                            </h3>

                            <p class="mt-4 text-sm leading-8 text-slate-400">
                                {{ $package['description'] }}
                            </p>
                        </div>

                        <div class="mt-6 flex-1">
                            <ul class="space-y-3">
                                @foreach ($features as $feature)
                                    <li class="flex items-start gap-3 text-sm leading-7 text-slate-300">
                                        <span class="mt-2 h-2 w-2 flex-none rounded-full bg-amber-300"></span>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-8 pt-5">
                            <a href="{{ route('contact') }}?website_type={{ \Illuminate\Support\Str::slug($package['name'], '_') }}"
                                class="inline-flex items-center gap-3 rounded-2xl border border-amber-300/20 bg-amber-300/10 px-4 py-3 text-sm font-black text-amber-300 transition hover:-translate-y-0.5 hover:border-amber-300/35 hover:bg-amber-300/15 hover:text-amber-200">
                                <span>Konsultasi Sekarang</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>

                            <p class="mt-3 text-xs font-medium tracking-wide text-slate-500">
                                Untuk {{ $package['name'] }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="px-5 py-8 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="marquee-mask overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.03] py-4">
                <div class="flex min-w-max gap-3 px-4 md:justify-center">
                    @foreach (['Laravel', 'Tailwind CSS', 'Blade', 'Alpine.js', 'MySQL', 'SEO', 'Responsive UI', 'Admin Panel'] as $tech)
                        <span
                            class="rounded-full border border-white/10 bg-slate-950/70 px-5 py-2 text-sm font-bold text-slate-300">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-12 grid gap-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <div class="section-kicker mb-5">Services</div>

                    <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                        Layanan pembuatan website dari tampilan profesional sampai sistem custom.
                    </h2>
                </div>

                <p class="max-w-2xl text-base leading-8 text-slate-400 lg:ml-auto">
                    RulfaDev membantu membangun website yang tidak hanya menarik secara visual,
                    tapi juga mudah digunakan, cepat diakses, dan siap mendukung kebutuhan bisnis.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                @forelse ($services as $service)
                    <article
                        class="reveal group premium-card rounded-[2rem] p-6 transition duration-300 hover:-translate-y-2">
                        <div class="mb-8 flex items-center justify-between">
                            <span
                                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-500/15 text-lg font-black text-blue-200">
                                @if ($service->icon && str_starts_with($service->icon, 'fa-'))
                                    <i class="{{ $service->icon }}"></i>
                                @else
                                    {{ $service->icon ?: str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                @endif
                            </span>

                            <span
                                class="text-2xl text-slate-600 transition group-hover:translate-x-1 group-hover:text-amber-300">
                                →
                            </span>
                        </div>

                        <h3 class="text-xl font-black text-white">
                            {{ $service->title }}
                        </h3>

                        <p class="mt-4 text-sm leading-7 text-slate-400">
                            {{ $service->description }}
                        </p>

                        @if ($service->features)
                            <div class="mt-6 space-y-2">
                                @foreach (array_slice($service->features, 0, 4) as $feature)
                                    <div class="flex items-center gap-2 text-sm text-slate-300">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-300"></span>
                                        {{ $feature }}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </article>
                @empty
                    <div class="glass-card rounded-[2rem] p-6 md:col-span-2 xl:col-span-4">
                        <p class="text-sm text-slate-400">
                            Belum ada layanan aktif. Silakan tambahkan layanan dari dashboard admin.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-12 max-w-3xl">
                <div class="section-kicker mb-5">Why Choose RulfaDev</div>

                <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                    Website bukan hanya tampil bagus, tapi juga harus jelas, cepat, dan mudah dikembangkan.
                </h2>
            </div>

            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
            [
                'title' => 'Mobile Responsive',
                'desc' => 'Tampilan website disesuaikan untuk desktop, tablet, dan smartphone agar client nyaman mengakses dari perangkat apa pun.',
            ],
            [
                'title' => 'SEO Friendly',
                'desc' => 'Struktur meta, heading, canonical, schema, dan konten dibuat lebih siap untuk kebutuhan optimasi mesin pencari.',
            ],
            [
                'title' => 'Admin Friendly',
                'desc' => 'Untuk website dinamis, konten seperti project, brand, layanan, dan testimonial dapat dikelola melalui dashboard.',
            ],
            [
                'title' => 'Clean Development',
                'desc' => 'Kode dibuat rapi, terstruktur, dan mudah dikembangkan agar website bisa bertumbuh sesuai kebutuhan bisnis.',
            ],
        ] as $item)
                    <article class="reveal premium-card rounded-[2rem] p-6">
                        <div
                            class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-500/15 text-lg font-black text-blue-200">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <h3 class="text-xl font-black text-white">
                            {{ $item['title'] }}
                        </h3>

                        <p class="mt-4 text-sm leading-7 text-slate-400">
                            {{ $item['desc'] }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="projects" class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div class="max-w-3xl">
                    <div class="section-kicker mb-5">Featured Work</div>

                    <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                        Project showcase yang memudahkan client memahami kualitas kerja.
                    </h2>
                </div>

                <a href="{{ route('projects.index') }}" class="btn-secondary">
                    Semua Project
                </a>
            </div>

            @if ($primaryProject)
                <div class="reveal mb-6 grid gap-6 lg:grid-cols-[1.1fr_0.9fr]">
                    <article class="project-glow premium-card overflow-hidden rounded-[2.25rem]">
                        <div class="relative min-h-[360px] overflow-hidden md:min-h-[460px]">
                            @if ($primaryProject->thumbnail)
                                <img src="{{ asset('storage/' . $primaryProject->thumbnail) }}"
                                    alt="{{ $primaryProject->title }}"
                                    class="absolute inset-0 h-full w-full object-cover transition duration-700 hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-slate-950/10">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-transparent to-amber-400/10">
                                </div>
                            @else
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-blue-600/35 via-slate-900 to-amber-400/15">
                                </div>
                            @endif

                            <div class="relative flex min-h-[360px] items-end p-6 md:min-h-[460px] md:p-8">
                                <div>
                                    <span
                                        class="rounded-full bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.22em] text-blue-100">
                                        {{ $primaryProject->category }}
                                    </span>

                                    <h3 class="mt-6 max-w-2xl text-3xl font-black text-white md:text-5xl">
                                        {{ $primaryProject->title }}
                                    </h3>

                                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-300 md:text-base">
                                        {{ $primaryProject->summary }}
                                    </p>

                                    <div class="mt-6 flex flex-wrap gap-2">
                                        @foreach ($primaryProject->tech_stack ?? [] as $tech)
                                            <span
                                                class="rounded-full border border-white/10 bg-slate-950/60 px-3 py-1 text-xs font-bold text-slate-300">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    <div class="grid gap-6">
                        <div class="glass-card rounded-[2rem] p-6">
                            <p class="text-sm font-bold uppercase tracking-[0.25em] text-amber-300">
                                Case Study
                            </p>

                            <h3 class="mt-4 text-2xl font-black text-white">
                                Problem → Solution → Result
                            </h3>

                            <p class="mt-4 text-sm leading-7 text-slate-400">
                                Setiap project bisa ditampilkan dalam format studi kasus agar client melihat proses
                                berpikir, fitur, teknologi, dan hasil yang dicapai.
                            </p>

                            <a href="{{ route('projects.show', $primaryProject) }}"
                                class="mt-6 inline-flex font-black text-amber-300 hover:text-amber-200">
                                Lihat Detail Project →
                            </a>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="glass-card rounded-[2rem] p-5">
                                <p class="text-xs uppercase tracking-widest text-slate-500">Year</p>
                                <p class="mt-2 text-2xl font-black text-white">
                                    {{ $primaryProject->year ?? '-' }}
                                </p>
                            </div>

                            <div class="glass-card rounded-[2rem] p-5">
                                <p class="text-xs uppercase tracking-widest text-slate-500">Status</p>
                                <p class="mt-2 text-2xl font-black capitalize text-white">
                                    {{ $primaryProject->status ?? 'private' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($featuredProjects->skip(1)->isNotEmpty())
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($featuredProjects->skip(1) as $project)
                        <article
                            class="reveal project-glow premium-card group overflow-hidden rounded-[2rem] transition duration-300 hover:-translate-y-2">
                            <div class="relative aspect-[16/10] overflow-hidden">
                                @if ($project->thumbnail)
                                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                        class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/65 to-transparent">
                                    </div>
                                @else
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-blue-600/25 via-slate-900 to-amber-400/10">
                                    </div>
                                @endif

                                <div class="relative flex h-full items-end p-6">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.25em] text-blue-200">
                                            {{ $project->category }}
                                        </p>
                                        <h3 class="mt-4 text-2xl font-black text-white">
                                            {{ $project->title }}
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <p class="text-sm leading-7 text-slate-400">
                                    {{ $project->summary }}
                                </p>

                                @if ($project->tech_stack)
                                    <div class="mt-5 flex flex-wrap gap-2">
                                        @foreach (array_slice($project->tech_stack, 0, 3) as $tech)
                                            <span
                                                class="rounded-full bg-white/[0.06] px-3 py-1 text-xs font-bold text-slate-300">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <a href="{{ route('projects.show', $project) }}"
                                    class="mt-6 inline-flex text-sm font-black text-amber-300 hover:text-amber-200">
                                    Baca Case Study →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @elseif (!$primaryProject)
                <div class="glass-card rounded-[2rem] p-6">
                    <p class="text-sm text-slate-400">
                        Belum ada featured project aktif. Silakan tambahkan project dari dashboard admin.
                    </p>
                </div>
            @endif
        </div>
    </section>

    <section id="brands" class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-12 grid gap-6 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                <div>
                    <div class="section-kicker mb-5">Trusted Brands</div>

                    <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                        Brand, client, dan collaborator yang menjadi bagian dari perjalanan digital.
                    </h2>
                </div>

                <p class="max-w-2xl text-base leading-8 text-slate-400 lg:ml-auto">
                    Setiap brand punya karakter, kebutuhan, dan value yang berbeda. Karena itu, brand dan collaborator
                    ditampilkan secara lebih premium sebagai bentuk apresiasi terhadap kepercayaan kerja sama.
                </p>
            </div>

            @if ($brands->isNotEmpty())
                <div
                    class="reveal brand-marquee-viewport mb-10 rounded-[2rem] border border-white/10 bg-white/[0.025] p-4 shadow-2xl shadow-black/20">
                    <div class="brand-marquee-track">
                        @foreach ([1, 2, 3, 4] as $group)
                            <div class="brand-marquee-group">
                                @foreach ($brands as $brand)
                                    <div
                                        class="flex h-24 w-52 flex-none items-center justify-center rounded-[1.5rem] border border-white/10 bg-slate-950/75 px-6 transition hover:border-blue-400/30 hover:bg-white/[0.06]">
                                        @if ($brand->logo)
                                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                                                class="max-h-14 max-w-36 object-contain opacity-75 grayscale transition duration-300 hover:opacity-100 hover:grayscale-0">
                                        @else
                                            <span class="brand-marquee-text-logo">
                                                {{ $brand->name }}
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <div
                    class="reveal mb-8 rounded-[2rem] border border-white/10 bg-gradient-to-br from-blue-600/20 via-slate-950 to-amber-400/10 p-6 md:p-8">
                    <div class="grid gap-6 md:grid-cols-[1fr_auto] md:items-center">
                        <div>
                            <p class="text-sm font-black uppercase tracking-[0.28em] text-amber-300">
                                Collaboration Matters
                            </p>

                            <h3 class="mt-3 text-2xl font-black text-white md:text-3xl">
                                Setiap kolaborasi adalah bukti kepercayaan dan bagian dari kredibilitas.
                            </h3>

                            <p class="mt-4 max-w-3xl text-sm leading-7 text-slate-400">
                                Brand yang pernah bekerja sama, brand yang dibangun, atau project internal ditampilkan
                                agar calon client dapat melihat ekosistem kerja secara lebih profesional.
                            </p>
                        </div>

                        <div class="grid grid-cols-3 gap-3 text-center">
                            <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4">
                                <p class="text-2xl font-black text-white">{{ $brands->count() }}+</p>
                                <p class="mt-1 text-xs text-slate-400">Brand</p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4">
                                <p class="text-2xl font-black text-white">{{ $featuredProjects->count() }}+</p>
                                <p class="mt-1 text-xs text-slate-400">Project</p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4">
                                <p class="text-2xl font-black text-white">
                                    <i class="fa-solid fa-handshake"></i>
                                </p>
                                <p class="mt-1 text-xs text-slate-400">Trust</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid items-stretch gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($brands as $brand)
                    <article
                        class="reveal group relative flex min-h-[360px] overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.035] p-6 shadow-2xl shadow-black/20 transition duration-300 hover:-translate-y-2 hover:border-blue-400/30 hover:bg-white/[0.055]">
                        <div
                            class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-blue-500/10 blur-3xl transition group-hover:bg-amber-400/10">
                        </div>

                        @if ($brand->logo)
                            <div class="pointer-events-none absolute inset-0">
                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                                    class="brand-card-bg-logo absolute inset-0 h-full w-full object-contain p-8">

                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/30">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/20">
                                </div>
                            </div>
                        @else
                            <div class="pointer-events-none absolute inset-0 flex items-center justify-end pr-6">
                                <span
                                    class="max-w-[70%] text-right font-serif text-3xl font-bold italic leading-tight tracking-[0.18em] text-white/[0.07]">
                                    {{ $brand->name }}
                                </span>
                            </div>

                            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/30">
                            </div>
                        @endif

                        <div class="relative z-10 flex h-full w-full flex-col">
                            <div class="mb-6 flex items-start justify-between gap-4">
                                <span
                                    class="rounded-full border border-blue-400/20 bg-blue-400/10 px-3 py-1 text-[10px] font-black uppercase tracking-[0.2em] text-blue-300">
                                    {{ str_replace('-', ' ', $brand->type) }}
                                </span>

                                @if ($brand->is_featured)
                                    <span
                                        class="rounded-full border border-amber-300/30 bg-amber-300/15 px-3 py-1 text-[10px] font-black uppercase tracking-[0.18em] text-amber-200">
                                        Featured
                                    </span>
                                @endif
                            </div>

                            <div class="max-w-[78%]">
                                <h3 class="text-2xl font-black leading-tight text-white">
                                    {{ $brand->name }}
                                </h3>

                                <p class="mt-5 line-clamp-5 text-sm leading-8 text-slate-400">
                                    {{ $brand->description ?: 'Brand atau collaborator yang pernah menjadi bagian dari perjalanan project digital.' }}
                                </p>
                            </div>

                            <div class="mt-auto pt-8">
                                <div class="flex items-center justify-between border-t border-white/10 pt-5">
                                    <span class="inline-flex items-center gap-2 text-xs font-bold text-slate-500">
                                        <i class="fa-solid fa-handshake-angle text-blue-300"></i>
                                        Collaborator
                                    </span>

                                    @if ($brand->website)
                                        <a href="{{ $brand->website }}" target="_blank" rel="noopener"
                                            class="inline-flex items-center gap-2 text-sm font-black text-amber-300 transition hover:text-amber-200">
                                            Visit
                                            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                                        </a>
                                    @else
                                        <span class="text-sm font-bold text-slate-600">
                                            Private
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="glass-card rounded-[2rem] p-6 sm:col-span-2 lg:col-span-4">
                        <p class="text-sm text-slate-400">
                            Belum ada brand aktif. Silakan tambahkan brand dari dashboard admin.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="tech-stack" class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-12 grid gap-6 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                <div>
                    <div class="section-kicker mb-5">Tech Stack</div>

                    <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                        Teknologi yang digunakan untuk membangun website modern dan scalable.
                    </h2>
                </div>

                <p class="max-w-2xl text-base leading-8 text-slate-400 lg:ml-auto">
                    Stack disesuaikan dengan kebutuhan project. Untuk website company profile bisa dibuat ringan,
                    sedangkan sistem custom bisa memakai backend, database, REST API, dan dashboard admin.
                </p>
            </div>

            <div class="grid gap-5 lg:grid-cols-2">
                @foreach ($techStacks as $category => $items)
                    <article
                        class="reveal glass-card rounded-[2rem] p-6 transition duration-300 hover:-translate-y-1 hover:border-blue-400/30">
                        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <h3 class="text-xl font-black text-white">
                                {{ $category }}
                            </h3>

                            <span
                                class="w-fit rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-xs font-bold text-slate-400">
                                {{ count($items) }} tools
                            </span>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            @foreach ($items as $item)
                                <span
                                    class="group inline-flex items-center gap-2 rounded-full border border-white/10 bg-slate-950/60 px-4 py-2 text-sm font-bold text-slate-300 transition hover:-translate-y-1 hover:border-amber-300/40 hover:bg-amber-300/10 hover:text-amber-100">
                                    <span
                                        class="h-1.5 w-1.5 rounded-full bg-blue-300 transition group-hover:bg-amber-300"></span>
                                    {{ $item }}
                                </span>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>

            <div
                class="reveal mt-10 rounded-[2rem] border border-white/10 bg-gradient-to-br from-blue-600/20 via-slate-900 to-amber-400/10 p-6 md:p-8">
                <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h3 class="text-2xl font-black text-white">
                            Tidak semua project harus memakai teknologi yang kompleks.
                        </h3>

                        <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-400">
                            Untuk website sederhana, stack dibuat ringan agar cepat dan mudah dirawat.
                            Untuk sistem custom, teknologi disesuaikan dengan kebutuhan fitur, database,
                            integrasi, dan skala penggunaan.
                        </p>
                    </div>

                    <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn-primary">
                        Diskusi Stack Project
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="process" class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="reveal mb-12 grid gap-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <div class="section-kicker mb-5">Workflow</div>

                    <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                        Alur kerja jelas agar client merasa aman dari awal sampai website online.
                    </h2>
                </div>

                <p class="max-w-2xl text-base leading-8 text-slate-400 lg:ml-auto">
                    Proses dibuat transparan, terarah, dan mudah dipahami. Cocok untuk client yang ingin
                    website profesional tanpa bingung teknis.
                </p>
            </div>

            <div class="relative grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
            [
                'title' => 'Discovery',
                'desc' => 'Diskusi kebutuhan, target user, referensi desain, dan tujuan website.',
            ],
            [
                'title' => 'Structure',
                'desc' => 'Menyusun halaman, konten utama, fitur, dan alur pengguna.',
            ],
            [
                'title' => 'Development',
                'desc' => 'Membangun website responsive, cepat, rapi, dan mudah dikelola.',
            ],
            [
                'title' => 'Launch',
                'desc' => 'Testing, optimasi dasar, deploy, dan penyesuaian akhir.',
            ],
        ] as $step)
                    <article class="reveal premium-card rounded-[2rem] p-6">
                        <p class="mb-8 text-sm font-black text-amber-300">
                            0{{ $loop->iteration }}
                        </p>

                        <h3 class="text-2xl font-black text-white">
                            {{ $step['title'] }}
                        </h3>

                        <p class="mt-4 text-sm leading-7 text-slate-400">
                            {{ $step['desc'] }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @if ($displayTestimonials->isNotEmpty())
        <section class="px-5 py-20 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="reveal mb-12 grid gap-6 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                    <div>
                        <div class="section-kicker mb-5">Testimonials</div>

                        <h2 class="text-balance text-3xl font-black leading-tight text-white md:text-5xl">
                            Feedback dari client dan project yang sudah dikerjakan.
                        </h2>
                    </div>

                    <p class="max-w-2xl text-base leading-8 text-slate-400 lg:ml-auto">
                        Testimonial dapat berasal dari data manual admin atau review langsung dari client melalui link
                        penilaian khusus.
                    </p>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($displayTestimonials as $testimonial)
                        @php
                            $rating = (int) ($testimonial['rating'] ?? 5);
                            $source = $testimonial['source'] ?? 'manual';
                        @endphp

                        <article class="reveal glass-card rounded-[2rem] p-6 transition hover:-translate-y-2">
                            <div class="mb-5 flex items-center justify-between gap-4">
                                <div class="flex gap-1 text-amber-300">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $rating ? 'text-amber-300' : 'text-slate-700' }}">
                                            ★
                                        </span>
                                    @endfor
                                </div>

                                <span
                                    class="rounded-full border px-3 py-1 text-[10px] font-black uppercase tracking-[0.18em]
                                {{ $source === 'client_review'
                                    ? 'border-emerald-400/20 bg-emerald-400/10 text-emerald-300'
                                    : 'border-blue-400/20 bg-blue-400/10 text-blue-300' }}">
                                    {{ $testimonial['label'] ?? 'Testimonial' }}
                                </span>
                            </div>

                            <p class="text-sm leading-8 text-slate-300">
                                “{{ $testimonial['message'] }}”
                            </p>

                            @if (!empty($testimonial['project_title']))
                                <div class="mt-5 rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                                    <p class="text-xs font-bold uppercase tracking-widest text-slate-500">
                                        Project
                                    </p>
                                    <p class="mt-2 text-sm font-bold text-white">
                                        {{ $testimonial['project_title'] }}
                                    </p>
                                </div>
                            @endif

                            <div class="mt-6 border-t border-white/10 pt-5">
                                <p class="font-black text-white">
                                    {{ $testimonial['name'] ?? 'Private Client' }}
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $testimonial['role'] ?? 'Client' }}
                                    @if (!empty($testimonial['company']))
                                        · {{ $testimonial['company'] }}
                                    @endif
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="px-5 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div
                class="reveal relative overflow-hidden rounded-[2.5rem] border border-white/10 bg-gradient-to-br from-blue-600/35 via-slate-900 to-amber-400/20 p-8 text-center shadow-2xl shadow-black/30 md:p-16">
                <div
                    class="pointer-events-none absolute left-1/2 top-0 h-64 w-64 -translate-x-1/2 rounded-full bg-white/10 blur-3xl">
                </div>

                <div class="relative">
                    <p class="mb-4 text-sm font-black uppercase tracking-[0.3em] text-amber-200">
                        Ready to build?
                    </p>

                    <h2 class="mx-auto max-w-4xl text-balance text-3xl font-black leading-tight text-white md:text-6xl">
                        Punya ide website untuk bisnis, komunitas, atau brand?
                    </h2>

                    <p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-slate-300">
                        Mari diskusikan kebutuhan website Anda melalui email atau WhatsApp bisnis resmi.
                    </p>

                    <div class="mt-9 flex flex-col justify-center gap-4 sm:flex-row">
                        <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn-primary">
                            Konsultasi via WhatsApp
                        </a>

                        <a href="mailto:{{ $email }}" class="btn-secondary">
                            Kirim Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
