@extends('layouts/main')

@section('layoutTitle')
    Home
@endsection

@section('layoutContent')
    <img id="bg-homepage" src="{{ asset('/images/programming.gif') }}" alt="programming">
    <div class="text-2xl text-gray-700 font-semibold">{{ config("app.name") }}</div>
    <div class="mt-1 text-lg text-gray-700 font-semibold">Computer Engineer</div>
@endsection