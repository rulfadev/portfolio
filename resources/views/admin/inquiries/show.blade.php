@extends('admin.layouts.app', [
    'title' => 'Detail Inquiry',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Inquiry Detail</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">{{ $inquiry->name }}</h2>
            <p class="mt-3 text-slate-400">Dikirim pada {{ $inquiry->created_at->format('d M Y H:i') }}</p>
        </div>

        <a href="{{ route('admin.inquiries.index') }}"
            class="rounded-full border border-white/10 px-6 py-3 text-sm font-bold text-white hover:bg-white/10">
            Kembali
        </a>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        <div class="space-y-6 xl:col-span-2">
            <section class="glass-card rounded-[2rem] p-6">
                <h3 class="mb-5 text-xl font-black text-white">Pesan Client</h3>

                <p class="whitespace-pre-line text-sm leading-8 text-slate-300">
                    {{ $inquiry->message }}
                </p>
            </section>

            <section class="glass-card rounded-[2rem] p-6">
                <h3 class="mb-5 text-xl font-black text-white">Update Status</h3>

                <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <x-form.select name="status" label="Status" :selected="old('status', $inquiry->status)" :options="$statuses" required />

                    <x-form.textarea name="admin_notes" label="Catatan Admin" :value="$inquiry->admin_notes"
                        placeholder="Catatan follow-up, kebutuhan khusus, atau hasil komunikasi..." rows="6" />

                    <button type="submit"
                        class="rounded-2xl bg-amber-400 px-6 py-3 text-sm font-black text-slate-950 hover:bg-amber-300">
                        Simpan Update
                    </button>
                </form>
            </section>
        </div>

        <div class="space-y-6">
            <section class="glass-card rounded-[2rem] p-6">
                <h3 class="mb-5 text-xl font-black text-white">Kontak</h3>

                <div class="space-y-4">
                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Nama</p>
                        <p class="mt-2 font-bold text-white">{{ $inquiry->name }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Email</p>
                        <p class="mt-2 break-all font-bold text-white">{{ $inquiry->email ?: '-' }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Phone</p>
                        <p class="mt-2 font-bold text-white">{{ $inquiry->phone ?: '-' }}</p>

                        @if ($inquiry->phone)
                            <a href="https://wa.me/{{ $inquiry->phone }}" target="_blank" rel="noopener"
                                class="mt-3 inline-flex text-sm font-black text-amber-300 hover:text-amber-200">
                                Chat WhatsApp →
                            </a>
                        @endif
                    </div>
                </div>
            </section>

            <section class="glass-card rounded-[2rem] p-6">
                <h3 class="mb-5 text-xl font-black text-white">Project</h3>

                <div class="space-y-4">
                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Jenis Website</p>
                        <p class="mt-2 font-bold text-white">
                            {{ $websiteTypes[$inquiry->website_type] ?? '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Budget</p>
                        <p class="mt-2 font-bold text-white">
                            {{ $budgetRanges[$inquiry->budget_range] ?? '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.035] p-4">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Timeline</p>
                        <p class="mt-2 font-bold text-white">
                            {{ $timelines[$inquiry->timeline] ?? '-' }}
                        </p>
                    </div>
                </div>
            </section>

            <x-ui.delete-form :action="route('admin.inquiries.destroy', $inquiry)" title="Hapus inquiry?" text="Inquiry ini akan dihapus permanen."
                button="Hapus Inquiry" />
        </div>
    </div>
@endsection
