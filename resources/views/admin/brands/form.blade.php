<div class="grid gap-6 xl:grid-cols-3">
    <div class="space-y-6 xl:col-span-2">
        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Informasi Brand</h3>

            <div class="grid gap-5 md:grid-cols-2">
                <div class="md:col-span-2">
                    <x-form.input name="name" label="Nama Brand" :value="$brand->name" placeholder="Contoh: Raden Club"
                        required />
                </div>

                <x-form.select name="type" label="Tipe Brand" :selected="old('type', $brand->type ?: 'collaboration')" :options="[
                    'collaboration' => 'Collaboration',
                    'brand-built' => 'Brand Built',
                    'client' => 'Client',
                    'internal' => 'Internal',
                    'partner' => 'Partner',
                ]" required />

                <x-form.input name="website" label="Website" type="url" :value="$brand->website"
                    placeholder="https://example.com" />

                <div class="md:col-span-2">
                    <x-form.textarea name="description" label="Deskripsi" :value="$brand->description"
                        placeholder="Jelaskan brand, kolaborasi, atau relasi project secara singkat..."
                        rows="5" />
                </div>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Logo Brand</h3>

            @if ($brand->logo)
                <div class="mb-5 flex items-center gap-4 rounded-2xl border border-white/10 bg-slate-950/70 p-4">
                    <div class="flex h-20 w-20 items-center justify-center overflow-hidden rounded-2xl bg-white">
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                            class="h-full w-full object-contain p-2">
                    </div>

                    <div>
                        <p class="font-bold text-white">Logo saat ini</p>
                        <p class="mt-1 text-sm text-slate-500">{{ $brand->logo }}</p>

                        <label class="mt-3 flex items-center gap-3 text-sm text-slate-300">
                            <input type="checkbox" name="remove_logo" value="1" class="form-checkbox">
                            Hapus logo saat update
                        </label>
                    </div>
                </div>
            @endif

            <input type="file" name="logo" accept="image/jpeg,image/png,image/webp,image/svg+xml"
                class="form-file">

            <p class="mt-3 text-xs leading-6 text-slate-500">
                Format: JPG, PNG, WEBP, SVG. Maksimal 2MB. Untuk logo, disarankan background transparan.
            </p>
        </section>
    </div>

    <div class="space-y-6">
        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Publish</h3>

            <div class="space-y-5">
                <x-form.input name="sort_order" label="Urutan" type="number" :value="$brand->sort_order ?? 0" placeholder="0" />

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $brand->is_featured))
                        class="form-checkbox">
                    Featured brand
                </label>

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $brand->exists ? $brand->is_active : true))
                        class="form-checkbox">
                    Tampilkan di website
                </label>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-4 text-xl font-black text-white">Preview</h3>

            <div class="rounded-[2rem] border border-white/10 bg-slate-950/70 p-5">
                <div
                    class="mb-6 flex h-16 w-16 items-center justify-center overflow-hidden rounded-3xl bg-gradient-to-br from-white to-blue-100 text-2xl font-black text-slate-950">
                    @if ($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                            class="h-full w-full object-contain p-2">
                    @else
                        {{ strtoupper(substr(old('name', $brand->name ?: 'B'), 0, 1)) }}
                    @endif
                </div>

                <h4 class="text-lg font-black text-white">
                    {{ old('name', $brand->name ?: 'Nama Brand') }}
                </h4>

                <p class="mt-2 text-xs font-bold uppercase tracking-[0.22em] text-blue-300">
                    {{ str_replace('-', ' ', old('type', $brand->type ?: 'collaboration')) }}
                </p>

                <p class="mt-4 text-sm leading-7 text-slate-400">
                    {{ old('description', $brand->description ?: 'Deskripsi brand akan tampil di sini.') }}
                </p>
            </div>
        </section>

        <div class="flex flex-col gap-3">
            <button type="submit"
                class="rounded-2xl bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                {{ $submitLabel }}
            </button>

            <a href="{{ route('admin.brands.index') }}"
                class="rounded-2xl border border-white/10 px-6 py-3 text-center text-sm font-bold text-white transition hover:bg-white/10">
                Batal
            </a>
        </div>
    </div>
</div>
