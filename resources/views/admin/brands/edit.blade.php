@extends('admin.layouts.app', [
    'title' => 'Edit Brand',
])

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Edit</p>
        <h2 class="text-3xl font-black text-white md:text-4xl">Edit Brand</h2>
        <p class="mt-3 text-slate-400">{{ $brand->name }}</p>
    </div>

    <form action="{{ route('admin.brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.brands.form', [
            'brand' => $brand,
            'submitLabel' => 'Update Brand',
        ])
    </form>
@endsection
