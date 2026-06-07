@extends('admin.layouts.app', [
    'title' => 'Edit Service',
])

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Edit</p>
        <h2 class="text-3xl font-black text-white md:text-4xl">Edit Service</h2>
        <p class="mt-3 text-slate-400">{{ $service->title }}</p>
    </div>

    <form action="{{ route('admin.services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.services.form', [
            'service' => $service,
            'submitLabel' => 'Update Service',
        ])
    </form>
@endsection
