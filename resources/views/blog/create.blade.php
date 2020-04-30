@extends('layouts.blog')

@section('layoutTitle')
    Create Article
@endsection

@section('layoutContent')
    <div class="text-2xl font-semibold text-gray-700">Create An Article</div>
    <form method="POST" action="/blog/article">
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
                <textarea name="body" class="border rounded border-gray-200 p-1 focus:border-blue-200 resize-none" id="body" rows="3"></textarea>
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Submit</button>
            </div>
        </div>
    </form>
@endsection