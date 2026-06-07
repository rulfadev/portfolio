@extends('admin.layouts.app', [
    'title' => 'Tambah Brand',
])

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Create</p>
        <h2 class="text-3xl font-black text-white md:text-4xl">Tambah Brand</h2>
        <p class="mt-3 text-slate-400">Tambahkan brand, client, partner, atau kolaborasi baru.</p>
    </div>

    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.brands.form', [
            'brand' => $brand,
            'submitLabel' => 'Simpan Brand',
        ])
    </form>
@endsection
