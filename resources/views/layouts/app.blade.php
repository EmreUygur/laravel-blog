<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laravel Blog')</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body style="background-color: @yield('bg-color', '#f8f8f8')">
        <div id="app">
            @yield('content')
        </div>
    </body>
    <script src="{{asset('js/app.js')}}"></script>
</html>
