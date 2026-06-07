@php
    $settings = $siteSettings ?? [];

    $brandName = $settings['brand_name'] ?? config('app.name', 'RulfaDev');
    $whatsapp = $settings['business_whatsapp'] ?? env('BUSINESS_WHATSAPP');

    $waText = urlencode('Halo ' . $brandName . ', saya ingin konsultasi pembuatan website.');
    $waUrl = $whatsapp ? 'https://wa.me/' . $whatsapp . '?text=' . $waText : route('contact');

    $siteLogo = $settings['site_logo'] ?? null;
    $siteLogoUrl = $siteLogo ? asset('storage/' . $siteLogo) : null;

    $navItems = [
        [
            'label' => 'Solusi',
            'url' => route('home') . '#packages',
        ],
        [
            'label' => 'Layanan',
            'url' => route('home') . '#services',
        ],
        [
            'label' => 'Project',
            'url' => route('home') . '#projects',
        ],
        [
            'label' => 'Stack',
            'url' => route('home') . '#tech-stack',
        ],
        [
            'label' => 'Proses',
            'url' => route('home') . '#process',
        ],
    ];
@endphp

<header x-data="{ open: false }" class="fixed inset-x-0 top-0 z-50 px-4 pt-4">
    <nav
        class="mx-auto max-w-7xl rounded-[1.5rem] border border-white/10 bg-slate-950/75 px-4 py-3 shadow-2xl shadow-black/25 backdrop-blur-2xl lg:px-5">
        <div class="flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="group flex items-center gap-3">
                <span
                    class="relative flex h-12 w-12 flex-none items-center justify-center rounded-[1.15rem] border border-white/10 bg-white/[0.06] shadow-2xl shadow-blue-600/20 backdrop-blur-xl transition duration-300 group-hover:-translate-y-0.5 group-hover:border-blue-400/30 group-hover:bg-white/[0.09]">
                    <span
                        class="absolute inset-0 rounded-[1.15rem] bg-gradient-to-br from-blue-500/25 via-transparent to-amber-300/15 opacity-80"></span>

                    <span
                        class="relative flex h-9 w-9 items-center justify-center overflow-hidden rounded-xl bg-white shadow-lg shadow-black/20 ring-1 ring-white/40">
                        @if ($siteLogoUrl)
                            <img src="{{ $siteLogoUrl }}" alt="{{ $brandName }}"
                                class="h-full w-full object-contain p-1.5">
                        @else
                            <span class="text-sm font-black text-slate-950">
                                {{ strtoupper(substr($brandName, 0, 1)) }}
                            </span>
                        @endif
                    </span>

                    <span
                        class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-slate-950">
                        <span
                            class="h-2.5 w-2.5 rounded-full bg-amber-300 shadow-[0_0_16px_rgba(251,191,36,0.9)]"></span>
                    </span>
                </span>

                <span class="min-w-0">
                    <span
                        class="block truncate text-sm font-black tracking-wide text-white transition group-hover:text-amber-200">
                        {{ $brandName }}
                    </span>

                    <span class="mt-0.5 block truncate text-[11px] font-semibold tracking-[0.16em] text-slate-500">
                        WEB DEVELOPMENT
                    </span>
                </span>
            </a>

            <div class="hidden items-center gap-1 rounded-full border border-white/10 bg-white/[0.03] p-1 lg:flex">
                @foreach ($navItems as $item)
                    <a href="{{ $item['url'] }}"
                        class="rounded-full px-4 py-2 text-sm font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="hidden items-center gap-3 md:flex">
                <a href="{{ $waUrl }}" target="_blank" rel="noopener"
                    class="btn-primary gap-2 px-5 py-2.5 text-sm" aria-label="Konsultasi WhatsApp">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                    <span>Konsultasi</span>
                </a>
            </div>

            <button type="button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/[0.04] text-white lg:hidden"
                @click="open = !open" aria-label="Toggle menu">
                <span x-show="!open">☰</span>
                <span x-show="open" x-cloak>×</span>
            </button>
        </div>

        <div x-show="open" x-cloak x-transition class="mt-4 border-t border-white/10 pt-4 lg:hidden">
            <div class="grid gap-2">
                @foreach ($navItems as $item)
                    <a href="{{ $item['url'] }}"
                        class="rounded-2xl px-4 py-3 text-sm font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white"
                        @click="open = false">
                        {{ $item['label'] }}
                    </a>
                @endforeach

                <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="mt-2 btn-primary text-sm">
                    Konsultasi Project
                </a>
            </div>
        </div>
    </nav>
</header>
