@extends('admin.layouts.app', [
    'title' => 'Site Settings',
])

@section('content')
    @php
        $brandName = old('brand_name', $settings['brand_name'] ?? config('app.name', 'RulfaDev'));
        $tagline = old(
            'brand_tagline',
            $settings['brand_tagline'] ?? 'Jasa Pembuatan Website & Custom Web Development',
        );
        $heroTitle = old('hero_title', $settings['hero_title'] ?? '');
        $heroDescription = old('hero_description', $settings['hero_description'] ?? '');
        $email = old('business_email', $settings['business_email'] ?? '');
        $phone = old('business_phone', $settings['business_phone'] ?? '');
        $whatsapp = old('business_whatsapp', $settings['business_whatsapp'] ?? '');
        $location = old('location_label', $settings['location_label'] ?? 'Indonesia');
        $seoTitle = old('seo_title', $settings['seo_title'] ?? '');
        $seoDescription = old('seo_description', $settings['seo_description'] ?? '');
        $seoKeywords = old('seo_keywords', $settings['seo_keywords'] ?? '');
        $siteLogo = old('site_logo', $settings['site_logo'] ?? null);
        $siteLogoUrl = $siteLogo ? asset('storage/' . $siteLogo) : null;
    @endphp

    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Configuration</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">Site Settings</h2>
            <p class="mt-3 text-slate-400">
                Kelola identitas brand, hero section, kontak bisnis, dan SEO website.
            </p>
        </div>

        <a href="{{ route('home') }}" target="_blank" rel="noopener"
            class="rounded-full border border-white/10 px-6 py-3 text-center text-sm font-bold text-white transition hover:bg-white/10">
            Lihat Website
        </a>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid gap-6 xl:grid-cols-3">
            <div class="space-y-6 xl:col-span-2">
                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Brand Identity</h3>

                    <div class="grid gap-5 md:grid-cols-2">
                        <x-form.input name="brand_name" label="Brand Name" :value="$brandName" placeholder="Contoh: RulfaDev"
                            required />

                        <x-form.input name="location_label" label="Lokasi Umum" :value="$location"
                            placeholder="Contoh: Indonesia" />

                        <div class="md:col-span-2">
                            <x-form.input name="brand_tagline" label="Brand Tagline" :value="$tagline"
                                placeholder="Contoh: Jasa Pembuatan Website & Custom Web Development" />
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-2 block text-sm font-bold text-slate-200">
                                Logo Website
                            </label>

                            @if ($siteLogoUrl)
                                <div
                                    class="mb-4 flex items-center gap-4 rounded-2xl border border-white/10 bg-slate-950/70 p-4">
                                    <div
                                        class="flex h-20 w-20 items-center justify-center overflow-hidden rounded-2xl bg-white">
                                        <img src="{{ $siteLogoUrl }}" alt="{{ $brandName }}"
                                            class="h-full w-full object-contain p-2">
                                    </div>

                                    <div>
                                        <p class="font-bold text-white">Logo saat ini</p>
                                        <p class="mt-1 text-sm text-slate-500">{{ $siteLogo }}</p>

                                        <label class="mt-3 flex items-center gap-3 text-sm text-slate-300">
                                            <input type="checkbox" name="remove_site_logo" value="1"
                                                class="form-checkbox">
                                            Hapus logo saat update
                                        </label>
                                    </div>
                                </div>
                            @endif

                            <input type="file" name="site_logo" accept="image/jpeg,image/png,image/webp,image/svg+xml"
                                class="form-file">

                            <p class="mt-2 text-xs leading-5 text-slate-500">
                                Format: JPG, PNG, WEBP, SVG. Maksimal 2MB. Disarankan logo transparan.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Hero Section</h3>

                    <div class="space-y-5">
                        <x-form.input name="hero_title" label="Hero Title" :value="$heroTitle"
                            placeholder="Jasa pembuatan website modern untuk bisnis profesional." required />

                        <x-form.textarea name="hero_description" label="Hero Description" :value="$heroDescription"
                            placeholder="Jelaskan value utama jasa website Anda..." rows="5" required />
                    </div>
                </section>

                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Kontak Bisnis</h3>

                    <div class="grid gap-5 md:grid-cols-2">
                        <x-form.input name="business_email" label="Email Bisnis" type="email" :value="$email"
                            placeholder="hello@rulfadev.com" />

                        <x-form.input name="business_phone" label="Nomor Bisnis" :value="$phone"
                            placeholder="6281234567890" />

                        <div class="md:col-span-2">
                            <x-form.input name="business_whatsapp" label="WhatsApp Bisnis" :value="$whatsapp"
                                placeholder="6281234567890" />

                            <p class="mt-2 text-xs leading-5 text-slate-500">
                                Bisa isi format 0812xxxx atau 62812xxxx. Sistem akan menyimpan dalam format angka
                                internasional untuk link WhatsApp.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">SEO Settings</h3>

                    <div class="space-y-5">
                        <x-form.input name="seo_title" label="SEO Title" :value="$seoTitle"
                            placeholder="RulfaDev - Jasa Pembuatan Website Profesional" required />

                        <x-form.textarea name="seo_description" label="SEO Description" :value="$seoDescription"
                            placeholder="Deskripsi singkat untuk mesin pencari..." rows="4" required />

                        <x-form.textarea name="seo_keywords" label="SEO Keywords" :value="$seoKeywords"
                            placeholder="web developer indonesia, jasa pembuatan website, laravel developer"
                            rows="4" />

                        <p class="text-xs leading-6 text-slate-500">
                            Gunakan keyword yang relevan dengan jasa Anda. Hindari keyword stuffing berlebihan.
                        </p>
                    </div>
                </section>
            </div>

            <div class="space-y-6">
                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Preview Brand</h3>

                    <div class="rounded-[2rem] border border-white/10 bg-slate-950/70 p-5">
                        <div class="mb-5 flex items-center gap-3">
                            <div
                                class="flex h-12 w-12 items-center justify-center overflow-hidden rounded-2xl bg-blue-600 text-lg font-black text-white">
                                @if ($siteLogoUrl)
                                    <img src="{{ $siteLogoUrl }}" alt="{{ $brandName }}"
                                        class="h-full w-full object-contain bg-white p-1.5">
                                @else
                                    {{ strtoupper(substr($brandName ?: 'R', 0, 1)) }}
                                @endif
                            </div>

                            <div>
                                <p class="font-black text-white">{{ $brandName ?: 'RulfaDev' }}</p>
                                <p class="text-xs text-slate-400">{{ $tagline ?: 'Web Development Service' }}</p>
                            </div>
                        </div>

                        <div class="rounded-2xl bg-white/[0.04] p-4">
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Hero Title</p>
                            <p class="mt-2 text-lg font-black leading-snug text-white">
                                {{ $heroTitle ?: 'Hero title akan tampil di sini.' }}
                            </p>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-slate-400">
                            {{ $heroDescription ?: 'Hero description akan tampil di sini.' }}
                        </p>
                    </div>
                </section>

                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Preview Kontak</h3>

                    <div class="space-y-3">
                        <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Email</p>
                            <p class="mt-2 break-all text-sm font-bold text-white">
                                {{ $email ?: '-' }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">WhatsApp</p>
                            <p class="mt-2 break-all text-sm font-bold text-white">
                                {{ $whatsapp ?: '-' }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Lokasi</p>
                            <p class="mt-2 text-sm font-bold text-white">
                                {{ $location ?: '-' }}
                            </p>
                        </div>
                    </div>
                </section>

                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Preview SEO</h3>

                    <div class="rounded-2xl border border-white/10 bg-slate-950/70 p-4">
                        <p class="text-xs text-slate-500">Google Preview</p>

                        <p class="mt-3 text-sm font-bold text-blue-300">
                            {{ $seoTitle ?: 'SEO title akan tampil di sini.' }}
                        </p>

                        <p class="mt-2 text-xs leading-6 text-slate-400">
                            {{ $seoDescription ?: 'SEO description akan tampil di sini.' }}
                        </p>

                        <p class="mt-2 truncate text-xs text-emerald-300">
                            {{ url('/') }}
                        </p>
                    </div>
                </section>

                <div class="flex flex-col gap-3">
                    <button type="submit"
                        class="rounded-2xl bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                        Simpan Settings
                    </button>

                    <a href="{{ route('admin.dashboard') }}"
                        class="rounded-2xl border border-white/10 px-6 py-3 text-center text-sm font-bold text-white transition hover:bg-white/10">
                        Kembali Dashboard
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
