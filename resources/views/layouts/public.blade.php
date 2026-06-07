@php
    $settings = $siteSettings ?? [];

    $brandName = $settings['brand_name'] ?? config('app.name', 'RulfaDev');

    $defaultSeoTitle = $settings['seo_title'] ?? $brandName . ' - Jasa Pembuatan Website Profesional';

    $defaultSeoDescription =
        $settings['seo_description'] ??
        'Jasa pembuatan website modern, responsif, SEO-friendly, dan mudah dikelola untuk bisnis, UMKM, komunitas, dan brand profesional.';

    $seoTitle = $seoTitle ?? $defaultSeoTitle;
    $seoDescription = $seoDescription ?? $defaultSeoDescription;
    $seoKeywords =
        $seoKeywords ??
        ($settings['seo_keywords'] ??
            'jasa pembuatan website, web developer, laravel developer, portfolio web developer');

    $canonicalUrl = $canonicalUrl ?? url()->current();

    $siteLogo = $settings['site_logo'] ?? null;
    $siteLogoUrl = $siteLogo ? asset('storage/' . $siteLogo) : asset('assets/img/logo.png');

    $ogTitle = $ogTitle ?? $seoTitle;
    $ogDescription = $ogDescription ?? $seoDescription;
    $ogType = $ogType ?? 'website';
    $ogImage = $ogImage ?? $siteLogoUrl;

    $businessEmail = $settings['business_email'] ?? env('BUSINESS_EMAIL');
    $businessPhone = $settings['business_phone'] ?? env('BUSINESS_PHONE');
    $locationLabel = $settings['location_label'] ?? 'Indonesia';
@endphp

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seoTitle }}</title>

    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}">
    <meta name="author" content="{{ $brandName }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    @if ($siteLogoUrl)
        <link rel="icon" href="{{ $siteLogoUrl }}">
        <link rel="apple-touch-icon" href="{{ $siteLogoUrl }}">
    @endif

    <meta property="og:site_name" content="{{ $brandName }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => $brandName,
        'description' => $seoDescription,
        'url' => url('/'),
        'logo' => $siteLogoUrl,
        'image' => $ogImage,
        'email' => $businessEmail,
        'telephone' => $businessPhone,
        'areaServed' => [
            '@type' => 'Country',
            'name' => $locationLabel,
        ],
        'serviceType' => [
            'Jasa Pembuatan Website',
            'Company Profile Website',
            'Landing Page',
            'Ecommerce Website',
            'Custom Web Application',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden bg-slate-950 text-slate-100 antialiased noise-bg">
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <a href="{{ $waUrl }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp"
        class="fixed bottom-5 right-5 z-50 inline-flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500 text-white shadow-2xl shadow-emerald-500/30 transition hover:-translate-y-1 hover:bg-emerald-400">
        <i class="fa-brands fa-whatsapp text-3xl"></i>
    </a>
</body>

</html>
