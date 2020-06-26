@extends('layouts.blog')

@section('layoutTitle')
    Emre UYGUR | Blog
@endsection

@section('layoutContent')
    @if(count($articles))
        <div class="flex flex-wrap sm:mx-16 items-start">
            <div class="flex flex-col w-full sm:w-4/5">
                @foreach ($articles as $article)
                    <div class="flex flex-col mb-8">
                        <div class="text-3xl text-gray-700 font-semibold">
                            <a class="outline-none" href="/blog/articles/{{ $article->slug }}">{{ $article->title }}</a>
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
            </div>
            <div class="tagsCard flex flex-col w-full sm:w-1/5 mt-4 sm:mt-0 rounded">
                <div class="tagsHeader p-2 mb-2">
                    Tags
                </div>
                <div class="flex flex-wrap m-2">
                    <a href="/blog" class="bg-tag py-1 px-2 rounded text-sm mr-2 mb-2">All</a>
                    @if(count($tags))
                        @foreach ( $tags as $tag )
                            <a href="/blog?tag={{ $tag->name }}" class="bg-tag py-1 px-2 rounded text-sm mr-2 mb-2"> {{ $tag->name }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @else 
        <div class="p-16 text-3xl text-red-400 font-bold text-center">
            No articles entered yet :/
        </div>
    @endif
    @auth
        <a href="/blog/articles/create" class="rounded-full h-12 w-12 m-2 bottom-0 right-0 fixed flex items-center justify-center bg-green-500 text-white">
            <i class="fas fa-plus"></i>
        </a>
    @endauth
@endsection