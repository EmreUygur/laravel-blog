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
            </div>
            <div class="m-2 flex flex-col">
                <label for="excerpt">Excerpt</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="excerpt" name="excerpt" value="{{ $article->excerpt }}" />
            </div>
            <div class="m-2 flex flex-col">
                <label for="body">Body</label>
                <textarea name="body" class="border rounded border-gray-200 p-1 focus:border-blue-200 resize-none" id="body" rows="3">
                    {{ $article->body }}
                </textarea>
            </div>
            <div class="m-2 flex flex-col">
                <label for="tags[]">Tags</label>
                <select id="tags[]" name="tags[]" class="border rounded border-gray-200 p-1 focus:border-blue-200" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Submit</button>
            </div>
        </div>
    </form>
@endsection