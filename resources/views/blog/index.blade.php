@extends('layouts.blog')

@section('layoutTitle')
    Blog
@endsection

@section('layoutContent')
    <div class="flex flex-col mx-16">
        @if(count($articles))
            @foreach ($articles as $article)
                <div class="flex flex-col mb-8">
                    <div class="text-3xl text-gray-700 font-semibold">
                        <a class="outline-none" href="/blog/article/{{ $article->id }}">{{ $article->title }}</a>
                    </div>
                    <div class="text-gray-600 font-normal">
                        <p class="text-lg">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                </div>
            @endforeach
        @else 
            <div class="mt-16 text-3xl text-red-400 font-bold text-center">
                No articles entered yet :/
            </div>
        @endif

        {{-- <div class="flex flex-col mb-8">
            <div class="text-3xl text-gray-700 font-semibold">Title</div>
            <div class="text-gray-600 font-normal">
                <p class="text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptatum? Corporis similique, dolores commodi nulla quo modi nisi neque necessitatibus sint porro dignissimos voluptates laboriosam adipisci ab voluptate consectetur a!
                </p>
            </div>
        </div>

        <div class="flex flex-col mb-8">
            <div class="text-3xl text-gray-700 font-semibold">Title</div>
            <div class="text-gray-600 font-normal">
                <p class="text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptatum? Corporis similique, dolores commodi nulla quo modi nisi neque necessitatibus sint porro dignissimos voluptates laboriosam adipisci ab voluptate consectetur a!
                </p>
            </div>
        </div>

        <div class="flex flex-col mb-8">
            <div class="text-3xl text-gray-700 font-semibold">Title</div>
            <div class="text-gray-600 font-normal">
                <p class="text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptatum? Corporis similique, dolores commodi nulla quo modi nisi neque necessitatibus sint porro dignissimos voluptates laboriosam adipisci ab voluptate consectetur a!
                </p>
            </div>
        </div>

        <div class="flex flex-col mb-8">
            <div class="text-3xl text-gray-700 font-semibold">Title</div>
            <div class="text-gray-600 font-normal">
                <p class="text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptatum? Corporis similique, dolores commodi nulla quo modi nisi neque necessitatibus sint porro dignissimos voluptates laboriosam adipisci ab voluptate consectetur a!
                </p>
            </div>
        </div>

        <div class="flex flex-col mb-8">
            <div class="text-3xl text-gray-700 font-semibold">Title</div>
            <div class="text-gray-600 font-normal">
                <p class="text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptatum? Corporis similique, dolores commodi nulla quo modi nisi neque necessitatibus sint porro dignissimos voluptates laboriosam adipisci ab voluptate consectetur a!
                </p>
            </div>
        </div>

        <div class="flex flex-col mb-8">
            <div class="text-3xl text-gray-700 font-semibold">Title</div>
            <div class="text-gray-600 font-normal">
                <p class="text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptatum? Corporis similique, dolores commodi nulla quo modi nisi neque necessitatibus sint porro dignissimos voluptates laboriosam adipisci ab voluptate consectetur a!
                </p>
            </div>
        </div>

        <div class="flex flex-col mb-8">
            <div class="text-3xl text-gray-700 font-semibold">Title</div>
            <div class="text-gray-600 font-normal">
                <p class="text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptatum? Corporis similique, dolores commodi nulla quo modi nisi neque necessitatibus sint porro dignissimos voluptates laboriosam adipisci ab voluptate consectetur a!
                </p>
            </div>
        </div> --}}
    </div>
@endsection