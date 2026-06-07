@extends('admin.layouts.app', [
    'title' => 'Tambah Service',
])

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Create</p>
        <h2 class="text-3xl font-black text-white md:text-4xl">Tambah Service</h2>
        <p class="mt-3 text-slate-400">Tambahkan layanan baru untuk homepage.</p>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        @include('admin.services.form', [
            'service' => $service,
            'submitLabel' => 'Simpan Service',
        ])
    </form>
@endsection
