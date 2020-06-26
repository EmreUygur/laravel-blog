@extends('layouts.app')

@section('title')
    @yield('layoutTitle')
@endsection

@section('bg-color')
    white
@endsection

@section('content')
    <BlogNav @auth {{ __('is-logged') }} @endauth name="{{ config("app.name") }}"></BlogNav>
    <div class="mx-8 mb-8 mt-24 sm:m-16">
        @yield('layoutContent')
    </div>
@endsection