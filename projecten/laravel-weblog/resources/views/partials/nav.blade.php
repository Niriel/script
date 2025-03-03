<nav>
    <div class="nav_top">
        <div class="nav_top_left">
            <a href="{{ route('articles.index') }}" class="nav_link">Home (logo)</a>
        </div>
        <div class="nav_top_right">
            @auth
            <a href="{{ route('dashboard.index') }}" class="nav_link">Dashboard</a>
            <a href="{{ route('auth.logout') }}" class="nav_link">Log out</a>
            @endauth
            @guest
            <a href="{{ route('auth.loginPage') }}" class="nav_link">Log in</a>
            @endguest
        </div>
    </div>
</nav>
