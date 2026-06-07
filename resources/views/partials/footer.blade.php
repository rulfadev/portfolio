@php
    $settings = $siteSettings ?? [];
    $brandName = $settings['brand_name'] ?? config('app.name', 'RulfaDev');
    $tagline = $settings['brand_tagline'] ?? 'Web Developer & Digital Solution Builder';
    $email = $settings['business_email'] ?? env('BUSINESS_EMAIL');
    $siteLogo = $settings['site_logo'] ?? null;
    $siteLogoUrl = $siteLogo ? asset('storage/' . $siteLogo) : null;
@endphp

<footer class="border-t border-white/10 bg-slate-950">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 py-12 md:grid-cols-4 lg:px-8">
        <div class="md:col-span-2">
            <div class="mb-4 flex items-center gap-3">
                <span
                    class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-2xl bg-blue-600 font-black text-white">
                    @if ($siteLogoUrl)
                        <img src="{{ $siteLogoUrl }}" alt="{{ $brandName }}"
                            class="h-full w-full object-contain bg-white p-1.5">
                    @else
                        {{ strtoupper(substr($brandName, 0, 1)) }}
                    @endif
                </span>
                <div>
                    <p class="font-bold text-white">{{ $brandName }}</p>
                    <p class="text-sm text-slate-400">{{ $tagline }}</p>
                </div>
            </div>

            <p class="max-w-xl text-sm leading-7 text-slate-400">
                Membangun website modern, responsif, dan SEO-friendly untuk bisnis, komunitas, dan brand yang ingin
                tampil lebih profesional.
            </p>
        </div>

        <div>
            <h3 class="mb-4 font-semibold text-white">Navigasi</h3>
            <div class="space-y-3 text-sm text-slate-400">
                <a href="{{ route('home') }}#services" class="block hover:text-white">Layanan</a>
                <a href="{{ route('projects.index') }}" class="block hover:text-white">Project</a>
                <a href="{{ route('home') }}#brands" class="block hover:text-white">Brand</a>
                <a href="{{ route('contact') }}" class="block hover:text-white">Kontak</a>
            </div>
        </div>

        <div>
            <h3 class="mb-4 font-semibold text-white">Kontak Bisnis</h3>
            <a href="mailto:{{ $email }}" class="text-sm text-slate-400">{{ $email }}</p>
        </div>
    </div>

    <div class="border-t border-white/10 px-5 py-5 text-center text-xs text-slate-500">
        © {{ date('Y') }} {{ $brandName }}. All rights reserved.
    </div>
</footer>
