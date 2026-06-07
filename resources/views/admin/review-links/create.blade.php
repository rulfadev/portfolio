@extends('admin.layouts.app', [
    'title' => 'Buat Review Link',
])

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Create</p>
        <h2 class="text-3xl font-black text-white md:text-4xl">Buat Link Penilaian</h2>
        <p class="mt-3 text-slate-400">Link ini diberikan ke client agar client bisa mengisi atau mengedit penilaiannya
            sendiri.</p>
    </div>

    <form action="{{ route('admin.review-links.store') }}" method="POST">
        @csrf

        <div class="grid gap-6 xl:grid-cols-3">
            <div class="space-y-6 xl:col-span-2">
                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Data Client</h3>

                    <div class="grid gap-5 md:grid-cols-2">
                        <x-form.input name="client_name" label="Nama Client" :value="old('client_name')"
                            placeholder="Nama client / owner / PIC" required />

                        <x-form.input name="client_email" label="Email Client" type="email" :value="old('client_email')"
                            placeholder="client@email.com" />

                        <div class="md:col-span-2">
                            <x-form.input name="client_phone" label="WhatsApp Client" :value="old('client_phone')"
                                placeholder="0812xxxx atau 62812xxxx" />
                        </div>
                    </div>
                </section>

                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Project</h3>

                    <x-form.select name="project_id" label="Project Terkait" :selected="old('project_id')" :options="['' => 'Tidak terkait project tertentu'] +
                        $projects->mapWithKeys(fn($project) => [$project->id => $project->title])->toArray()" />
                </section>
            </div>

            <div class="space-y-6">
                <section class="glass-card rounded-[2rem] p-6">
                    <h3 class="mb-5 text-xl font-black text-white">Pengaturan Link</h3>

                    <x-form.input name="expires_at" label="Tanggal Kedaluwarsa" type="datetime-local" :value="old('expires_at')" />

                    <p class="mt-3 text-xs leading-6 text-slate-500">
                        Kosongkan jika link tidak memiliki batas waktu. Link tetap bisa dinonaktifkan manual dari admin.
                    </p>
                </section>

                <div class="flex flex-col gap-3">
                    <button type="submit"
                        class="rounded-2xl bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 transition hover:bg-amber-300">
                        Buat Link
                    </button>

                    <a href="{{ route('admin.review-links.index') }}"
                        class="rounded-2xl border border-white/10 px-6 py-3 text-center text-sm font-bold text-white transition hover:bg-white/10">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
