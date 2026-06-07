@php
    $featuresValue = old('features_text', $service->features ? implode("\n", $service->features) : '');
@endphp

<div class="grid gap-6 xl:grid-cols-3">
    <div class="space-y-6 xl:col-span-2">
        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Informasi Layanan</h3>

            <div class="grid gap-5 md:grid-cols-2">
                <div class="md:col-span-2">
                    <x-form.input name="title" label="Judul Layanan" :value="$service->title"
                        placeholder="Contoh: Company Profile Website" required />
                </div>

                <x-form.input name="slug" label="Slug" :value="$service->slug" placeholder="Kosongkan untuk otomatis" />

                <x-form.input name="icon" label="Icon / Singkatan" :value="$service->icon"
                    placeholder="Contoh: CP, LP, WEB" />

                <div class="md:col-span-2">
                    <x-form.textarea name="description" label="Deskripsi" :value="$service->description"
                        placeholder="Jelaskan layanan secara singkat dan menarik..." rows="5" required />
                </div>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Fitur Layanan</h3>

            <x-form.textarea name="features_text" label="Daftar Fitur" :value="$featuresValue"
                placeholder="Tulis satu fitur per baris" rows="8" />

            <p class="mt-3 text-xs leading-6 text-slate-500">
                Contoh: Responsive design, SEO basic, Fast loading, Contact CTA.
            </p>
        </section>
    </div>

    <div class="space-y-6">
        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Publish</h3>

            <div class="space-y-5">
                <x-form.input name="sort_order" label="Urutan" type="number" :value="$service->sort_order ?? 0" placeholder="0" />

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->exists ? $service->is_active : true))
                        class="form-checkbox">
                    Tampilkan di website
                </label>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-4 text-xl font-black text-white">Preview Singkat</h3>

            <div class="rounded-[2rem] border border-white/10 bg-slate-950/70 p-5">
                <div
                    class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-500/15 text-lg font-black text-blue-200">
                    {{ old('icon', $service->icon ?: 'S') }}
                </div>

                <h4 class="text-lg font-black text-white">
                    {{ old('title', $service->title ?: 'Judul Layanan') }}
                </h4>

                <p class="mt-3 text-sm leading-7 text-slate-400">
                    {{ old('description', $service->description ?: 'Deskripsi layanan akan tampil di sini.') }}
                </p>
            </div>
        </section>

        <div class="flex flex-col gap-3">
            <button type="submit"
                class="rounded-2xl bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                {{ $submitLabel }}
            </button>

            <a href="{{ route('admin.services.index') }}"
                class="rounded-2xl border border-white/10 px-6 py-3 text-center text-sm font-bold text-white transition hover:bg-white/10">
                Batal
            </a>
        </div>
    </div>
</div>
