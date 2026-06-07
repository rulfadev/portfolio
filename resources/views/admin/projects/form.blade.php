@php
    $featuresValue = old('features_text', $project->features ? implode("\n", $project->features) : '');
    $techStackValue = old('tech_stack_text', $project->tech_stack ? implode("\n", $project->tech_stack) : '');
@endphp

<div class="grid gap-6 xl:grid-cols-3">
    <div class="space-y-6 xl:col-span-2">
        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Informasi Utama</h3>

            <div class="grid gap-5 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label for="title" class="mb-2 block text-sm font-semibold text-slate-200">Judul Project</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}"
                        required
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>

                <div>
                    <label for="slug" class="mb-2 block text-sm font-semibold text-slate-200">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $project->slug) }}"
                        placeholder="Kosongkan untuk otomatis"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>

                <div>
                    <label for="category" class="mb-2 block text-sm font-semibold text-slate-200">Kategori</label>
                    <input type="text" id="category" name="category"
                        value="{{ old('category', $project->category) }}"
                        placeholder="Web Application, Ecommerce, Landing Page"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>

                <div class="md:col-span-2">
                    <label for="summary" class="mb-2 block text-sm font-semibold text-slate-200">Ringkasan</label>
                    <textarea id="summary" name="summary" rows="4" required
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">{{ old('summary', $project->summary) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="mb-2 block text-sm font-semibold text-slate-200">Deskripsi
                        Lengkap</label>
                    <textarea id="description" name="description" rows="5"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">{{ old('description', $project->description) }}</textarea>
                </div>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Case Study</h3>

            <div class="space-y-5">
                <div>
                    <label for="problem" class="mb-2 block text-sm font-semibold text-slate-200">Problem</label>
                    <textarea id="problem" name="problem" rows="4"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">{{ old('problem', $project->problem) }}</textarea>
                </div>

                <div>
                    <label for="solution" class="mb-2 block text-sm font-semibold text-slate-200">Solution</label>
                    <textarea id="solution" name="solution" rows="4"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">{{ old('solution', $project->solution) }}</textarea>
                </div>

                <div>
                    <label for="result" class="mb-2 block text-sm font-semibold text-slate-200">Result</label>
                    <textarea id="result" name="result" rows="4"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">{{ old('result', $project->result) }}</textarea>
                </div>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Fitur & Tech Stack</h3>

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label for="features_text" class="mb-2 block text-sm font-semibold text-slate-200">Fitur</label>
                    <textarea id="features_text" name="features_text" rows="7" placeholder="Satu fitur per baris"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">{{ $featuresValue }}</textarea>
                </div>

                <div>
                    <label for="tech_stack_text" class="mb-2 block text-sm font-semibold text-slate-200">Tech
                        Stack</label>
                    <textarea id="tech_stack_text" name="tech_stack_text" rows="7" placeholder="Satu teknologi per baris"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">{{ $techStackValue }}</textarea>
                </div>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">SEO Project</h3>

            <div class="space-y-5">
                <div>
                    <label for="seo_title" class="mb-2 block text-sm font-semibold text-slate-200">SEO Title</label>
                    <input type="text" id="seo_title" name="seo_title"
                        value="{{ old('seo_title', $project->seo_title) }}"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>

                <div>
                    <label for="seo_description" class="mb-2 block text-sm font-semibold text-slate-200">SEO
                        Description</label>
                    <textarea id="seo_description" name="seo_description" rows="3"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">{{ old('seo_description', $project->seo_description) }}</textarea>
                </div>
            </div>
        </section>
    </div>

    <div class="space-y-6">
        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Publish</h3>

            <div class="space-y-5">
                <div>
                    <x-form.select name="status" label="Status Project" :selected="old('status', $project->status ?: 'private')" :options="[
                        'private' => 'Private',
                        'demo' => 'Demo',
                        'live' => 'Live',
                    ]"
                        required />
                </div>

                <div>
                    <label for="year" class="mb-2 block text-sm font-semibold text-slate-200">Tahun</label>
                    <input type="number" id="year" name="year" value="{{ old('year', $project->year) }}"
                        min="2000" max="{{ now()->addYears(2)->year }}"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>

                <div>
                    <label for="sort_order" class="mb-2 block text-sm font-semibold text-slate-200">Urutan</label>
                    <input type="number" id="sort_order" name="sort_order"
                        value="{{ old('sort_order', $project->sort_order ?? 0) }}" min="0"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured))
                        class="rounded border-white/10 bg-slate-950">
                    Featured Project
                </label>

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $project->exists ? $project->is_active : true))
                        class="rounded border-white/10 bg-slate-950">
                    Tampilkan di website
                </label>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Media Project</h3>

            <div class="space-y-6">
                <div>
                    <label for="thumbnail" class="mb-2 block text-sm font-semibold text-slate-200">
                        Thumbnail Project
                    </label>

                    @if ($project->thumbnail)
                        <div class="mb-4 overflow-hidden rounded-2xl border border-white/10 bg-slate-950">
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                class="aspect-video w-full object-cover">
                        </div>

                        <label class="mb-4 flex items-center gap-3 text-sm text-slate-300">
                            <input type="checkbox" name="remove_thumbnail" value="1"
                                class="rounded border-white/10 bg-slate-950">
                            Hapus thumbnail saat update
                        </label>
                    @endif

                    <input type="file" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png,image/webp"
                        class="form-file">

                    <p class="mt-2 text-xs leading-5 text-slate-500">
                        Format: JPG, PNG, WEBP. Maksimal 3MB. Rasio yang disarankan 16:10 atau 16:9.
                    </p>
                </div>

                <div>
                    <label for="gallery" class="mb-2 block text-sm font-semibold text-slate-200">
                        Gallery / Screenshot Project
                    </label>

                    @if ($project->gallery)
                        <div class="mb-4 grid gap-3 sm:grid-cols-2">
                            @foreach ($project->gallery as $image)
                                <div class="overflow-hidden rounded-2xl border border-white/10 bg-slate-950">
                                    <img src="{{ asset('storage/' . $image) }}"
                                        alt="{{ $project->title }} gallery {{ $loop->iteration }}"
                                        class="aspect-video w-full object-cover">

                                    <label
                                        class="flex items-center gap-3 border-t border-white/10 px-4 py-3 text-xs text-slate-300">
                                        <input type="checkbox" name="remove_gallery[]" value="{{ $image }}"
                                            class="rounded border-white/10 bg-slate-950">
                                        Hapus gambar ini
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <input type="file" id="gallery" name="gallery[]" multiple
                        accept="image/jpeg,image/png,image/webp" class="form-file">

                    <p class="mt-2 text-xs leading-5 text-slate-500">
                        Bisa upload beberapa screenshot sekaligus. Maksimal 4MB per gambar.
                    </p>
                </div>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">Client</h3>

            <div class="space-y-5">
                <div>
                    <label for="client_name" class="mb-2 block text-sm font-semibold text-slate-200">Nama
                        Client</label>
                    <input type="text" id="client_name" name="client_name"
                        value="{{ old('client_name', $project->client_name) }}" placeholder="Kosongkan jika private"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>

                <label class="flex items-center gap-3 text-sm text-slate-300">
                    <input type="checkbox" name="is_client_private" value="1" @checked(old('is_client_private', $project->is_client_private))
                        class="rounded border-white/10 bg-slate-950">
                    Sembunyikan nama client
                </label>
            </div>
        </section>

        <section class="glass-card rounded-[2rem] p-6">
            <h3 class="mb-5 text-xl font-black text-white">URL</h3>

            <div class="space-y-5">
                <div>
                    <label for="demo_url" class="mb-2 block text-sm font-semibold text-slate-200">Demo URL</label>
                    <input type="url" id="demo_url" name="demo_url"
                        value="{{ old('demo_url', $project->demo_url) }}" placeholder="https://example.com"
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>

                <div>
                    <label for="repo_url" class="mb-2 block text-sm font-semibold text-slate-200">Repository
                        URL</label>
                    <input type="url" id="repo_url" name="repo_url"
                        value="{{ old('repo_url', $project->repo_url) }}" placeholder="https://github.com/..."
                        class="w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none focus:border-blue-400">
                </div>
            </div>
        </section>

        <div class="flex flex-col gap-3">
            <button type="submit"
                class="rounded-2xl bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 hover:bg-amber-300">
                {{ $submitLabel }}
            </button>

            <a href="{{ route('admin.projects.index') }}"
                class="rounded-2xl border border-white/10 px-6 py-3 text-center text-sm font-bold text-white hover:bg-white/10">
                Batal
            </a>
        </div>
    </div>
</div>
