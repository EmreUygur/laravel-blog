@extends('layouts.blog')

@section('layoutTitle')
    Emre UYGUR | {{ $article->title }}
@endsection

@section('layoutContent')
    <div class="flex flex-col mt-6 text-gray-700">
        <div class="flex justify-between items-center mb-2">
            <div class="text-2xl font-semibold">{{ $article->title }}</div>
            <div class="text-sm font-medium">{{ date_format($article->created_at, 'd/m/Y') }}</div>
        </div>
        <div class="text-xl font-medium mb-2">{{ $article->excerpt }}</div>
        <div>{!! $article->body !!}</div>
    </div>
@endsection