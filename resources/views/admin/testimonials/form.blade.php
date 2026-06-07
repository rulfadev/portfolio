<div class="grid gap-6 xl:grid-cols-3">
    <div class="space-y-6 xl:col-span-2">
        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Informasi Client</h3>

            <div class="grid gap-5 md:grid-cols-2">
                <x-form.input name="name" label="Nama Client" :value="$testimonial->name" placeholder="Contoh: Owner UMKM" />

                <x-form.input name="role" label="Role" :value="$testimonial->role" placeholder="Contoh: Business Owner" />

                <div class="md:col-span-2">
                    <x-form.input name="company" label="Company / Brand" :value="$testimonial->company"
                        placeholder="Contoh: Private Client" />
                </div>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Pesan Testimonial</h3>

            <x-form.textarea name="message" label="Pesan" :value="$testimonial->message" placeholder="Tulis feedback client..."
                rows="8" required />
        </section>
    </div>

    <div class="space-y-6">
        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Publish</h3>

            <div class="space-y-5">
                <x-form.select name="rating" label="Rating" :selected="old('rating', $testimonial->rating ?: 5)" :options="[
                    '5' => '5 Bintang',
                    '4' => '4 Bintang',
                    '3' => '3 Bintang',
                    '2' => '2 Bintang',
                    '1' => '1 Bintang',
                ]" required />

                <x-form.input name="sort_order" label="Urutan" type="number" :value="$testimonial->sort_order ?? 0" placeholder="0" />

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="is_anonymous" value="1" @checked(old('is_anonymous', $testimonial->exists ? $testimonial->is_anonymous : true))
                        class="form-checkbox">
                    Tampilkan sebagai Private Client
                </label>

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->exists ? $testimonial->is_active : true))
                        class="form-checkbox">
                    Tampilkan di website
                </label>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-4 text-xl font-black text-white">Preview</h3>

            <div class="rounded-[2rem] border border-white/10 bg-slate-950/70 p-5">
                <div class="mb-5 flex gap-1 text-amber-300">
                    @for ($i = 1; $i <= (int) old('rating', $testimonial->rating ?: 5); $i++)
                        ★
                    @endfor
                </div>

                <p class="text-sm leading-8 text-slate-300">
                    “{{ old('message', $testimonial->message ?: 'Pesan testimonial akan tampil di sini.') }}”
                </p>

                <div class="mt-6 border-t border-white/10 pt-5">
                    <p class="font-black text-white">
                        {{ old('is_anonymous', $testimonial->exists ? $testimonial->is_anonymous : true) ? 'Private Client' : old('name', $testimonial->name ?: 'Client') }}
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ old('role', $testimonial->role ?: 'Client') }}
                    </p>
                </div>
            </div>
        </section>

        <div class="flex flex-col gap-3">
            <button type="submit"
                class="rounded-2xl bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                {{ $submitLabel }}
            </button>

            <a href="{{ route('admin.testimonials.index') }}"
                class="rounded-2xl border border-white/10 px-6 py-3 text-center text-sm font-bold text-white transition hover:bg-white/10">
                Batal
            </a>
        </div>
    </div>
</div>
