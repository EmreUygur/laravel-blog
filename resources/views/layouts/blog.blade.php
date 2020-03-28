@extends('layouts.app')

@section('title')
    @yield('layoutTitile')
@endsection

@section('bg-color')
    white
@endsection

@section('content')
    <div class="m-16">
        @yield('layoutContent')
    </div>
@endsection