@extends('layouts.blog')

@section('layoutTitle')
    Blog
@endsection

@section('layoutContent')
    <div class="flex flex-col mx-16">
        <div class="flex flex-wrap mb-4">
            @if(count($tags))
                @foreach ( $tags as $tag )
                    <a href="/blog?tag={{ $tag->name }}" class="underline mr-2"> {{ $tag->name }}</a>                    
                @endforeach
            @endif
        </div>
        @if(count($articles))
            @foreach ($articles as $article)
                <div class="flex flex-col mb-8">
                    <div class="text-3xl text-gray-700 font-semibold">
                        <a class="outline-none" href="/blog/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </div>
                    <div class="flex flex-col text-gray-600 font-normal">
                        <p class="text-lg">
                            {!! $article->excerpt !!}
                        </p>
                        <p class="text-sm mt-1">
                            {{ date_format($article->created_at, 'd/m/Y') }}
                        </p>
                    </div>
                </div>
            @endforeach
        @else 
            <div class="mt-16 text-3xl text-red-400 font-bold text-center">
                No articles entered yet :/
            </div>
        @endif
    </div>
    <a href="/blog/articles/create" class="rounded-full h-12 w-12 m-2 bottom-0 right-0 fixed flex items-center justify-center bg-green-500 text-white">
        <i class="fas fa-plus"></i>
    </a>
@endsection