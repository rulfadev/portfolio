@php
    $settings = $siteSettings ?? [];

    $brandName = $settings['brand_name'] ?? config('app.name', 'RulfaDev');

    $defaultSeoTitle = $settings['seo_title'] ?? $brandName . ' - Jasa Pembuatan Website Profesional';

    $defaultSeoDescription =
        $settings['seo_description'] ??
        'Jasa pembuatan website modern, responsif, SEO-friendly, cepat, dan mudah dikelola untuk bisnis, UMKM, komunitas, dan brand profesional.';

    $seoTitle = $seoTitle ?? $defaultSeoTitle;
    $seoDescription = $seoDescription ?? $defaultSeoDescription;
    $seoKeywords =
        $seoKeywords ??
        ($settings['seo_keywords'] ??
            'jasa pembuatan website, web developer indonesia, laravel developer, website responsive');

    $canonicalUrl = $canonicalUrl ?? url()->current();

    $siteLogo = $settings['site_logo'] ?? null;
    $siteFavicon = $settings['site_favicon'] ?? null;

    $siteLogoUrl = $siteLogo ? asset('storage/' . $siteLogo) : asset('assets/img/logo.png');
    $faviconUrl = $siteFavicon ? asset('storage/' . $siteFavicon) : $siteLogoUrl;

    $ogTitle = $ogTitle ?? $seoTitle;
    $ogDescription = $ogDescription ?? $seoDescription;
    $ogType = $ogType ?? 'website';
    $ogImage = $ogImage ?? $siteLogoUrl;

    $businessEmail = $settings['business_email'] ?? env('BUSINESS_EMAIL');
    $businessPhone = $settings['business_phone'] ?? env('BUSINESS_PHONE');
    $locationLabel = $settings['location_label'] ?? 'Indonesia';
@endphp

<title>{{ $seoTitle }}</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $seoKeywords }}">
<meta name="author" content="{{ $brandName }}">
<meta name="robots" content="{{ $robots ?? 'index, follow' }}">
<meta name="theme-color" content="#020617">

<link rel="canonical" href="{{ $canonicalUrl }}">

@if ($faviconUrl)
    <link rel="icon" href="{{ $faviconUrl }}">
    <link rel="shortcut icon" href="{{ $faviconUrl }}">
    <link rel="apple-touch-icon" href="{{ $faviconUrl }}">
@endif

<meta property="og:site_name" content="{{ $brandName }}">
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:url" content="{{ $canonicalUrl }}">

@if ($ogImage)
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="{{ $brandName }}">
@endif

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $ogTitle }}">
<meta name="twitter:description" content="{{ $ogDescription }}">

@if ($ogImage)
    <meta name="twitter:image" content="{{ $ogImage }}">
@endif

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
