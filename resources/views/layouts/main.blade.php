@extends('layouts.app')

@section('title')
    @yield('layoutTitile')
@endsection

@section('content')
<Navbar @auth {{ __('is-logged') }} token="{{ csrf_token() }}" @else token="" @endauth></Navbar>
    <div class="mx-8 mb-8 mt-24 sm:m-16">
        @yield('layoutContent')
    </div>
@endsection