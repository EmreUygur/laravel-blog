@extends('layouts.blog')

@section('layoutTitle')
    Emre UYGUR | {{ $article->title }}
@endsection

@section('layoutContent')
    <div class="flex flex-col mt-6 text-gray-700">
        <div class="flex justify-between items-center mb-2">
            <div class="text-2xl font-semibold">{{ $article->title }}</div>
            <div class="text-sm font-medium"><i class="far fa-calendar"></i></i> {{ date_format($article->created_at, 'd/m/Y') }}</div>
        </div>
        <div class="mb-2">
            <img src="/storage/cover_images/{{ $article->cover_image }}" alt="{{ $article->cover_image }}">
        </div>
        <div class="text-xl font-medium mb-2">{{ $article->excerpt }}</div>
        <div class="article-body">{!! $article->body !!}</div>
        @if (count($article->tags))
            <div class="mt-6 mb-12 flex flex-wrap border-t-4 border-gray-400">
                @foreach ($article->tags as $tag)
                    <div class="text-medium mr-2 pt-3">
                        <a href="/blog?tag={{ $tag->name }}" class="bg-tag py-1 px-2 rounded text-sm mr-2"> {{ $tag->name }}</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <share-box title="{{ $article->title }}"></share-box>
    @auth
        <div class="flex flex-col bottom-0 right-0 mb-4 mx-2 fixed">
            <form action="/blog/articles/{{ $article->id }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="rounded-full h-12 w-12 my-1 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
            <a href="/blog/articles/{{ $article->id }}/edit" class="rounded-full h-12 w-12 my-1 flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    @endauth
@endsection