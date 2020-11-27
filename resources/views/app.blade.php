<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Мафия | @yield('title')</title>

        <!-- Bootstrap CSS -->
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="https://kit.fontawesome.com/d5203c85d3.js" crossorigin="anonymous"></script>

        @yield('styles')
    </head>
    <body>
        @include('navbar.main')
        <br>
        <div class="container">
            @yield('breadcrumbs')
            <h1 style="text-align: center;">@yield('title')</h1>
            <br>
            @yield('content')
        </div>
    </body>
</html>
