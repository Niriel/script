<nav>
    <div class="nav_top left_right">
        <div class="left">
            <a href="{{ route('articles.index') }}" role="button">Home (logo)</a>
            <a href="{{ route('categories.index') }}" role="button">Categories</a>
        </div>
        <div class="right">
            @auth
            @if (!Auth::user()->has_premium)
            <a href="{{ route('premium.index') }}" role="button" class="premium">Premium</a>
            @endif
            <a href="{{ route('dashboard.index') }}" role="button">Dashboard</a>
            <a href="{{ route('auth.logout') }}" role="button">Log out</a>
            @endauth
            @guest
            <a href="{{ route('auth.loginPage') }}" role="button">Log in</a>
            @endguest
        </div>
    </div>
</nav>
