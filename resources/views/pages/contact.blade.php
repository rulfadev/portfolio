@extends('layouts.public', [
    'seoTitle' => 'Konsultasi Website - RulfaDev',
    'seoDescription' => 'Konsultasikan kebutuhan pembuatan website company profile, landing page, ecommerce, atau custom web app bersama RulfaDev.',
    'canonicalUrl' => route('contact'),
    'ogType' => 'website',
])

@section('content')
    @php
        $settings = $siteSettings ?? [];

        $brandName = $settings['brand_name'] ?? 'RulfaDev';
        $email = $settings['business_email'] ?? env('BUSINESS_EMAIL');
        $whatsapp = $settings['business_whatsapp'] ?? env('BUSINESS_WHATSAPP');

        $waText = urlencode('Halo ' . $brandName . ', saya ingin konsultasi pembuatan website.');
        $waUrl = $whatsapp ? 'https://wa.me/' . $whatsapp . '?text=' . $waText : '#';

        $websiteTypes = $websiteTypes ?? [];
        $budgetRanges = $budgetRanges ?? [];
        $timelines = $timelines ?? [];
    @endphp

    <section class="relative overflow-hidden px-5 pb-12 pt-36 lg:px-8 lg:pt-44">
        <div
            class="pointer-events-none absolute left-1/2 top-28 -z-10 h-96 w-96 -translate-x-1/2 rounded-full bg-blue-600/25 blur-3xl">
        </div>
        <div class="pointer-events-none absolute right-10 top-48 -z-10 h-64 w-64 rounded-full bg-amber-400/10 blur-3xl">
        </div>

        <div class="mx-auto max-w-7xl">
            <div class="reveal max-w-4xl">
                <div class="section-kicker mb-6">
                    Project Inquiry
                </div>

                <h1
                    class="text-balance text-4xl font-black leading-[1.05] tracking-tight text-white md:text-6xl xl:text-7xl">
                    Konsultasikan kebutuhan website Anda.
                </h1>

                <p class="mt-7 max-w-3xl text-base leading-8 text-slate-300 md:text-lg">
                    Ceritakan jenis website, fitur yang dibutuhkan, estimasi budget, dan timeline.
                    Saya akan membantu menyusun solusi website yang paling sesuai untuk bisnis, komunitas, atau brand Anda.
                </p>
            </div>
        </div>
    </section>

    <section class="px-5 pb-20 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-[1fr_0.75fr]">
            <div class="reveal glass-card rounded-[2rem] p-6 md:p-8">
                @if (session('success'))
                    <div
                        class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-200">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-400/20 bg-red-500/10 px-5 py-4 text-sm text-red-200">
                        <p class="mb-2 font-bold">Ada beberapa input yang perlu diperbaiki:</p>
                        <ul class="list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <h2 class="text-2xl font-black text-white">Detail Kontak</h2>
                        <p class="mt-2 text-sm leading-7 text-slate-400">
                            Gunakan kontak bisnis yang aktif agar mudah dihubungi kembali.
                        </p>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <x-form.input name="name" label="Nama" :value="old('name')" placeholder="Nama Anda / nama bisnis"
                            required />

                        <x-form.input name="email" label="Email" type="email" :value="old('email')"
                            placeholder="email@domain.com" />

                        <div class="md:col-span-2">
                            <x-form.input name="phone" label="WhatsApp / Nomor HP" :value="old('phone')"
                                placeholder="0812xxxx atau 62812xxxx" />
                        </div>
                    </div>

                    <div class="border-t border-white/10 pt-6">
                        <h2 class="text-2xl font-black text-white">Kebutuhan Project</h2>
                        <p class="mt-2 text-sm leading-7 text-slate-400">
                            Pilih opsi yang paling mendekati. Detail bisa dijelaskan di bagian pesan.
                        </p>
                    </div>

                    <div class="grid gap-5 md:grid-cols-3">
                        <x-form.select name="website_type" label="Jenis Website" :selected="old('website_type')" :options="['' => 'Pilih jenis website'] + $websiteTypes" />

                        <x-form.select name="budget_range" label="Budget" :selected="old('budget_range')" :options="['' => 'Pilih range budget'] + $budgetRanges" />

                        <x-form.select name="timeline" label="Timeline" :selected="old('timeline')" :options="['' => 'Pilih timeline'] + $timelines" />
                    </div>

                    <x-form.textarea name="message" label="Pesan / Brief Project" :value="old('message')"
                        placeholder="Contoh: Saya ingin membuat website company profile untuk bisnis ..., butuh halaman layanan, portfolio, kontak WhatsApp, dan SEO basic."
                        rows="8" required />

                    <button type="submit"
                        class="w-full rounded-2xl bg-amber-400 px-6 py-4 text-sm font-black text-slate-950 transition hover:-translate-y-1 hover:bg-amber-300 md:w-auto">
                        Kirim Inquiry
                    </button>
                </form>
            </div>

            <aside class="reveal space-y-6">
                <div class="premium-card rounded-[2rem] p-6">
                    <p class="mb-4 text-sm font-black uppercase tracking-[0.25em] text-blue-300">
                        Fast Contact
                    </p>

                    <h2 class="text-2xl font-black text-white">
                        Ingin diskusi lebih cepat?
                    </h2>

                    <p class="mt-4 text-sm leading-7 text-slate-400">
                        Anda juga bisa langsung menghubungi melalui WhatsApp atau email bisnis resmi.
                    </p>

                    <div class="mt-6 space-y-3">
                        <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn-primary w-full gap-2"
                            aria-label="Chat WhatsApp">
                            <i class="fa-brands fa-whatsapp text-lg"></i>
                            <span>Chat</span>
                        </a>

                        @if ($email)
                            <a href="mailto:{{ $email }}" class="btn-secondary w-full">
                                Kirim Email
                            </a>
                        @endif
                    </div>
                </div>

                <div class="glass-card rounded-[2rem] p-6">
                    <p class="mb-4 text-sm font-black uppercase tracking-[0.25em] text-amber-300">
                        Brief Tips
                    </p>

                    <div class="space-y-4">
                        @foreach (['Jelaskan jenis website yang ingin dibuat.', 'Sertakan contoh website referensi jika ada.', 'Tuliskan fitur utama yang dibutuhkan.', 'Sebutkan estimasi deadline atau timeline.', 'Gunakan kontak yang aktif untuk follow-up.'] as $tip)
                            <div class="flex items-start gap-3 text-sm leading-7 text-slate-300">
                                <span class="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-amber-300"></span>
                                <span>{{ $tip }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </section>
@endsection
