@extends('layouts.blog')

@section('layoutTitle')
    Edit Article
@endsection

@section('layoutContent')
    <div class="text-2xl font-semibold text-gray-700">Edit the Article</div>
    <form method="POST" action="/blog/articles/{{ $article->id }}">
        @csrf
        @method('PUT')
        <div class="flex flex-col mt-6">
            <div class="m-2 flex flex-col">
                <label for="title">Title</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="title" name="title" value="{{ $article->title }}" />
                @error("title")
                    <p class="text-sm text-red-500 font-semibold">
                        {{ $errors->first("title") }}
                    </p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label for="excerpt">Excerpt</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="excerpt" name="excerpt" value="{{ $article->excerpt }}" />
                @error("excerpt")
                    <p class="text-sm text-red-500 font-semibold">
                        {{ $errors->first("excerpt") }}
                    </p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label for="body">Body</label>
                <editor body="{!! $article->body !!}"></editor>
                @error("body")
                    <p class="text-sm text-red-500 font-semibold">
                        {{ $errors->first("body") }}
                    </p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image">
                @error("cover_image")
                    <p class="text-sm text-red-500 font-semibold">
                        {{ $errors->first("cover_image") }}
                    </p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label for="tags[]">Tags</label>
                <tags-input :all="{{ json_encode($tags) }}" :selected="{{ json_encode($article->tags) }}" ></tags-input>
                @error("tags")
                    <p class="text-sm text-red-500 font-semibold">
                        {{ $errors->first("tags") }}
                    </p>
                @enderror
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Submit</button>
            </div>
        </div>
    </form>
@endsection