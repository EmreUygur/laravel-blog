@extends('layouts.app')

@section('title')
    @yield('layoutTitle')
@endsection

@section('bg-color')
    white
@endsection

@section('content')
    <BlogNav @auth {{ __('is-logged') }} @endauth name="{{ config("app.name") }}"></BlogNav>
    <div class="mx-8 mb-8 mt-24 sm:my-16 sm:mx-32">
        @yield('layoutContent')
    </div>
@endsection