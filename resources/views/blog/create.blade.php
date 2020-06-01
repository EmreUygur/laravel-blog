@extends('layouts.blog')

@section('layoutTitle')
    Create Article
@endsection

@section('layoutContent')
    <div class="text-2xl font-semibold text-gray-700">Create An Article</div>
    <form method="POST" action="/blog/articles" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mt-6">
            <div class="m-2 flex flex-col">
                <label for="title">Title</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="title" name="title"/>
            </div>
            <div class="m-2 flex flex-col">
                <label for="excerpt">Excerpt</label>
                <input type="text" class="border rounded border-gray-200 p-1 focus:border-blue-200" id="excerpt" name="excerpt" />
            </div>
            <div class="m-2 flex flex-col">
                <label for="body">Body</label>
                <editor></editor>
            </div>
            <div class="m-2 flex flex-col">
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image">
            </div>
            <div class="m-2 flex flex-col">
                <label for="tags[]">Tags</label>
                {{-- <select id="tags[]" name="tags[]" class="border rounded border-gray-200 p-1 focus:border-blue-200 h-20" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select> --}}
                <tags-input :all="{{ json_encode($tags) }}" :selected="[]" ></tags-input>
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Submit</button>
            </div>
        </div>
    </form>
    {{-- <tags-input :existedTags="{{ json_encode($tags) }}" :tags="[]" name="tags[]" ></tags-input> --}}
@endsection