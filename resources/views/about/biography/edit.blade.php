@extends('layouts/main')

@section('layoutTitle')
    Edit Biography
@endsection

@section('layoutContent')
    <div class="text-2xl font-semibold text-gray-700">Edit Your Biography</div>
    <form method="POST" action="/about/biography/{{ $biography->id }}">
        @csrf
        @method('PUT')
        <div class="flex flex-col mt-6">
            <div class="m-2">
                <textarea class="p-1 border border-gray-400 rounded" name="biography">{{ $biography->biography }}</textarea>
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded">Submit</button>
            </div>
        </div>
    </form>
@endsection