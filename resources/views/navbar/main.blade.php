<div class="navbar navbar-expand-xl navbar-dark bg-dark">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fas fa-bars"></span>
    </button>
    <a class="navbar-brand text-uppercase font-weight-bold" href="{{ route('home') }}">{{ __('mafia.mafia') }}</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @yield('navbar.pre')
            @foreach (config('navbar.pages') as $name => $route)
                @include('navbar.item', ['name' => $name, 'route' => $route])
            @endforeach
            @yield('navbar.post')
            <li class="nav-item">
                <span class="navbar-text px-3">|</span>
            </li>
            @auth
                @if (Auth::user()->role == 'admin')
                    @include('navbar.item', ['name' => 'Админ-панель', 'route' => 'admin.panel'])
                @endif
                @include('navbar.item', ['name' => 'Аккаунт', 'route' => 'user.acc'])
                @include('navbar.item', ['name' => 'Выйти', 'route' => 'user.logout'])
            @endauth
            @guest
                @include('navbar.item', ['name' => 'Войти', 'route' => 'user.login'])
            @endguest
        </ul>
    </div>
</div>
