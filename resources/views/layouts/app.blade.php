<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laravel Blog')</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('fontawesome-free-5.13.0-web/css/all.css') }}">
        
        {{-- SEO --}}
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
    </head>
    <body style="background-color: @yield('bg-color', '#f8f8f8')">
        <div id="app">
            @yield('content')
        </div>
    </body>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</html>
