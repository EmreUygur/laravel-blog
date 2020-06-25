@extends('layouts/main')

@section('layoutTitile')
    Login
@endsection

@section('layoutContent')
    <form action="{{ route("login") }}" method="POST">
        @csrf
        <div class="flex flex-col content-center p-6 w-full sm:w-1/2 lg:w-1/3 m-auto border-2 border-gray-300 rounded">
            <div class="flex flex-col mx-2">
                <label>Email</label>
                <input type="email" value="{{ old('email')}}" class="border rounded border-gray-200 p-1 mb-2 focus:border-blue-200" name="email">
                @error('email')
                    <span class="text-sm text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex flex-col mx-2">
                <label>Password</label>
                <input type="password" class="border rounded border-gray-200 p-1 mb-2 focus:border-blue-200" name="password">
                @error('password')
                    <span class="text-sm text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="m-2">
                <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded focus:border-blue-200">Login</button>
            </div>
        </div>
    </form>
@endsection