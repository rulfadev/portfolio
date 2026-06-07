@extends('admin.layouts.app', [
    'title' => 'Edit Project',
])

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
        <div>
            <p class="mb-2 text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Edit</p>
            <h2 class="text-3xl font-black text-white md:text-4xl">Edit Project</h2>
            <p class="mt-3 text-slate-400">{{ $project->title }}</p>
        </div>

        <a href="{{ route('projects.show', $project) }}" target="_blank"
            class="rounded-full border border-white/10 px-6 py-3 text-center text-sm font-bold text-white hover:bg-white/10">
            Lihat Public
        </a>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.projects.form', [
            'project' => $project,
            'submitLabel' => 'Update Project',
        ])
    </form>
@endsection
