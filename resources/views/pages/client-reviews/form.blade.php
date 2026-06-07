@extends('layouts.public', [
    'seoTitle' => 'Penilaian Client - ' . ($siteSettings['brand_name'] ?? 'RulfaDev'),
    'seoDescription' => 'Halaman penilaian project client.',
    'robots' => 'noindex, nofollow',
])

@section('content')
    @php
        $settings = $siteSettings ?? [];
        $brandName = $settings['brand_name'] ?? 'RulfaDev';
        $whatsapp = $settings['business_whatsapp'] ?? env('BUSINESS_WHATSAPP');
        $waText = urlencode('Halo ' . $brandName . ', saya ingin konsultasi pembuatan website.');
        $waUrl = $whatsapp ? 'https://wa.me/' . $whatsapp . '?text=' . $waText : route('contact');

        $isSubmitted = filled($review);
    @endphp

    <section class="relative overflow-hidden px-5 pb-12 pt-36 lg:px-8 lg:pt-44">
        <div
            class="pointer-events-none absolute left-1/2 top-28 -z-10 h-96 w-96 -translate-x-1/2 rounded-full bg-blue-600/25 blur-3xl">
        </div>

        <div class="mx-auto max-w-5xl">
            <div class="reveal">
                <div class="section-kicker mb-6">
                    Client Review
                </div>

                <h1 class="text-balance text-4xl font-black leading-[1.05] tracking-tight text-white md:text-6xl">
                    {{ $isSubmitted ? 'Edit penilaian Anda' : 'Berikan penilaian untuk project ini' }}
                </h1>

                <p class="mt-7 max-w-3xl text-base leading-8 text-slate-300 md:text-lg">
                    Penilaian ini hanya dapat dibuat satu kali melalui link khusus ini. Jika sudah pernah mengisi,
                    Anda tetap bisa memperbarui isi penilaian melalui link yang sama selama link masih aktif.
                </p>
            </div>
        </div>
    </section>

    <section class="px-5 pb-20 lg:px-8">
        <div class="mx-auto grid max-w-5xl gap-6 lg:grid-cols-[1fr_0.65fr]">
            <div class="reveal glass-card rounded-[2rem] p-6 md:p-8">
                @if (!$reviewLink->can_be_used)
                    <div
                        class="rounded-2xl border border-red-400/20 bg-red-500/10 px-5 py-4 text-sm leading-7 text-red-200">
                        Link penilaian ini sudah tidak aktif atau sudah kedaluwarsa.
                    </div>
                @else
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

                    <form action="{{ route('client-reviews.update', $reviewLink->token) }}" method="POST"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid gap-5 md:grid-cols-2">
                            <x-form.input name="client_name" label="Nama" :value="old('client_name', $review->client_name ?? $reviewLink->client_name)" placeholder="Nama Anda"
                                required />

                            <x-form.input name="client_role" label="Role / Jabatan" :value="old('client_role', $review->client_role ?? '')"
                                placeholder="Contoh: Owner" />

                            <div class="md:col-span-2">
                                <x-form.input name="company" label="Company / Brand" :value="old('company', $review->company ?? '')"
                                    placeholder="Nama bisnis / brand" />
                            </div>
                        </div>

                        <x-form.select name="rating" label="Rating" :selected="old('rating', $review->rating ?? 5)" :options="[
                            ['value' => '5', 'label' => '5 Bintang - Sangat Puas'],
                            ['value' => '4', 'label' => '4 Bintang - Puas'],
                            ['value' => '3', 'label' => '3 Bintang - Cukup'],
                            ['value' => '2', 'label' => '2 Bintang - Kurang'],
                            ['value' => '1', 'label' => '1 Bintang - Tidak Puas'],
                        ]" required />

                        <x-form.textarea name="message" label="Penilaian / Testimonial" :value="old('message', $review->message ?? '')"
                            placeholder="Ceritakan pengalaman Anda selama project, kualitas hasil, komunikasi, dan manfaat website yang dibuat."
                            rows="7" required />

                        <x-form.textarea name="suggestions" label="Saran / Masukan" :value="old('suggestions', $review->suggestions ?? '')"
                            placeholder="Opsional. Tulis saran atau masukan untuk peningkatan layanan." rows="5" />

                        <label class="flex items-start gap-3 text-sm leading-7 text-slate-300">
                            <input type="checkbox" name="consent_to_publish" value="1" @checked(old('consent_to_publish', $review->consent_to_publish ?? false))
                                class="form-checkbox mt-1">
                            <span>
                                Saya mengizinkan penilaian ini ditampilkan sebagai testimonial di website.
                                Nama/brand dapat disamarkan jika diperlukan.
                            </span>
                        </label>

                        <button type="submit"
                            class="rounded-2xl bg-amber-400 px-6 py-4 text-sm font-black text-slate-950 transition hover:-translate-y-1 hover:bg-amber-300">
                            {{ $isSubmitted ? 'Update Penilaian' : 'Kirim Penilaian' }}
                        </button>
                    </form>
                @endif
            </div>

            <aside class="reveal space-y-6">
                <div class="premium-card rounded-[2rem] p-6">
                    <p class="mb-4 text-sm font-black uppercase tracking-[0.25em] text-blue-300">
                        Project
                    </p>

                    <h2 class="text-2xl font-black text-white">
                        {{ $reviewLink->project?->title ?? 'Project Review' }}
                    </h2>

                    <p class="mt-4 text-sm leading-7 text-slate-400">
                        Penilaian diberikan untuk project yang sudah dikerjakan bersama {{ $brandName }}.
                    </p>
                </div>

                <div class="glass-card rounded-[2rem] p-6">
                    <p class="mb-4 text-sm font-black uppercase tracking-[0.25em] text-amber-300">
                        Status
                    </p>

                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            Link:
                            <span class="{{ $reviewLink->can_be_used ? 'text-emerald-300' : 'text-red-300' }}">
                                {{ $reviewLink->can_be_used ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </p>

                        <p>
                            Penilaian:
                            <span class="{{ $isSubmitted ? 'text-emerald-300' : 'text-amber-300' }}">
                                {{ $isSubmitted ? 'Sudah dikirim' : 'Belum dikirim' }}
                            </span>
                        </p>

                        @if ($review?->updated_at)
                            <p>
                                Terakhir diubah:
                                <span class="text-slate-400">
                                    {{ $review->updated_at->format('d M Y H:i') }}
                                </span>
                            </p>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </section>
@endsection
