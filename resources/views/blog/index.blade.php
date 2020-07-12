@extends('layouts.blog')

@section('layoutTitle')
    Emre UYGUR | Blog
@endsection

@section('layoutContent')
    @if(count($articles))
        <div class="flex flex-wrap sm:mx-16 items-start">
            <div class="flex flex-col w-full sm:pr-8 md:w-4/5">
                @if ($title !== NULL)
                    <div class="text-4xl font-semibold text-gray-700 mb-8">
                        {{ $title }}
                    </div>
                @endif
                @foreach ($articles as $article)
                    <article-box 
                        title="{{ $article->title}}"
                        excerpt="{{ $article->excerpt }}"
                        slug="{{ $article->slug }}"
                        cover_image="{{ $article->cover_image }}"
                        created_at="{{ date_format($article->created_at, 'd/m/Y') }}"
                    ></article-box>
                @endforeach
                
                <pagination :currentpage="{{ $articles->currentPage() }}" :numofpages="{{ $articles->lastPage() }}"></pagination>
            
            </div>
            <div class="tagsCard flex flex-col w-full md:w-1/5 mt-4 md:mt-0 rounded">
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