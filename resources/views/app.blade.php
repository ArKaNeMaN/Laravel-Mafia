<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Мафия | @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        @yield('styles')
    </head>
    <body>
        <div class="container">
            {{-- @include('navigation-dropdown') --}}
            <h1 style="text-align: center;">@yield('title')</h1>
            <br>
            @yield('content')
        </div>
    </body>
</html>
