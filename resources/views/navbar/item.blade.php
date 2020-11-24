<li class="nav-item {{ Route::currentRouteName() == $route ? 'active' : '' }}">
    <a class="nav-link" href="{{ route($route) }}">{{ $name }}</a>
</li>
