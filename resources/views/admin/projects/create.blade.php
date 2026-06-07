@extends('admin.layouts.app', [
    'title' => 'Tambah Project',
])

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Create</p>
        <h2 class="text-3xl font-black text-white md:text-4xl">Tambah Project</h2>
        <p class="mt-3 text-slate-400">Tambahkan project baru ke portfolio.</p>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.projects.form', [
            'project' => $project,
            'submitLabel' => 'Simpan Project',
        ])
    </form>
@endsection
