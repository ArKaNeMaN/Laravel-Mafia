<div class="navbar navbar-expand-xl navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">{{ __('mafia.mafia') }}</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @yield('navbar.pre')
            @foreach (config('navbar.pages') as $name => $route)
                @include('navbar.item', ['name' => $name, 'route' => $route])
            @endforeach
            @yield('navbar.post')
        </ul>
    </div>
</div>
