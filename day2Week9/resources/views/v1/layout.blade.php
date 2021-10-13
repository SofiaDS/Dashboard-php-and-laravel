<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Layout | @yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
        <div class='bg'></div>
        <div class=container1></div>
            {{-- <header>
                <nav>
                    <span><a href="/">Home</a></span>
                    <span id='navLink2'><a href="{{route('dashboard')}}">User-list</a></span>
                </nav>
            </header> --}}
            @yield('content')
            @yield('script-locali')
        <div class='bgTable'></div>
    </body>
</html>
