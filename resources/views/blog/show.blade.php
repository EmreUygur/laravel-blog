@extends('layouts.blog')

@section('layoutTitle')
    Emre UYGUR | {{ $article->title }}
@endsection

@section('layoutContent')
    <div class="flex flex-col mt-6 text-gray-700">
        <div class="text-2xl font-semibold mb-2">{{ $article->title }}</div>
        <div class="text-lg font-medium mb-2">{{ $article->excerpt }}</div>
        <div>{{ $article->body }}</div>
    </div>
@endsection