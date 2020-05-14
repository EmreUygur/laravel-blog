@extends('layouts/main')

@section('layoutTitile')
    Login
@endsection

@section('layoutContent')
    <form action="{{ route("login") }}" method="POST">
        @csrf
        <div class="flex flex-col content-center p-6 w-1/3 m-auto border-2 border-gray-300 rounded">
            <div class="flex flex-col m-2">
                <label>Email</label>
                <input type="email" class="border rounded border-gray-200 p-1 focus:border-blue-200" name="email">
            </div>
            <div class="flex flex-col m-2">
                <label>Password</label>
                <input type="password" class="border rounded border-gray-200 p-1 focus:border-blue-200" name="password">
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Login</button>
            </div>
        </div>
    </form>
@endsection