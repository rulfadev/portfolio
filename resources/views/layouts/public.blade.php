<!DOCTYPE html>
<html lang="id">

<head>
    @include('partials.seo-head')

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
