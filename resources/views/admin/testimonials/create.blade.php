@extends('admin.layouts.app', [
    'title' => 'Tambah Testimonial',
])

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Create</p>
        <h2 class="text-3xl font-black text-white md:text-4xl">Tambah Testimonial</h2>
        <p class="mt-3 text-slate-400">Tambahkan feedback client baru.</p>
    </div>

    <form action="{{ route('admin.testimonials.store') }}" method="POST">
        @csrf

        @include('admin.testimonials.form', [
            'testimonial' => $testimonial,
            'submitLabel' => 'Simpan Testimonial',
        ])
    </form>
@endsection
