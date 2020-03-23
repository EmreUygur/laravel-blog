<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laravel Blog')</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <Navbar></Navbar>
            <div class="m-16">
                @yield('content')
            </div>
        </div>
    </body>
    <script src="{{asset('js/app.js')}}"></script>
</html>
