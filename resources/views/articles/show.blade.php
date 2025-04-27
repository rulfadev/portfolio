@extends('layouts.app')

@section('content')
    <div class="container max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
        <p class="text-gray-500 text-sm">Dilihat {{ $article->views }} kali</p>
        <img src="{{ url('storage/' . $article->image) }}" alt="{{ $article->title }}" class="mt-4">
        <div class="mt-4 prose">
            {!! $article->content !!}
        </div>
    </div>
@endsection