@extends('layouts/main')

@section('layoutTitle')
    Dashboard
@endsection

@section('layoutContent')
    <div class="mt-6">
        <div class="text-gray-700 text-2xl">
            Welcome, {{ Auth::user()->name }}
        </div>
    </div>
@endsection