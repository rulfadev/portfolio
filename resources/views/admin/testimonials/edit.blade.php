@extends('admin.layouts.app', [
    'title' => 'Edit Testimonial',
])

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Edit</p>
        <h2 class="text-3xl font-black text-white md:text-4xl">Edit Testimonial</h2>
        <p class="mt-3 text-slate-400">{{ $testimonial->name }}</p>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.testimonials.form', [
            'testimonial' => $testimonial,
            'submitLabel' => 'Update Testimonial',
        ])
    </form>
@endsection
