@extends('layouts.app')

@section('title')
    @yield('layoutTitile')
@endsection

@section('bg-color')
    white
@endsection

@section('content')
    <BlogNav></BlogNav>
    <div class="mx-8 mb-8 mt-24 sm:m-16">
        @yield('layoutContent')
    </div>
@endsection