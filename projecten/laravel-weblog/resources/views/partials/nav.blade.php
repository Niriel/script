<nav>
    <div class="nav_top left_right">
        <div class="left">
            <a href="{{ route('articles.index') }}" class="button_link">Home (logo)</a>
        </div>
        <div class="right">
            @auth
            <a href="{{ route('dashboard.index') }}" class="button_link">Dashboard</a>
            <a href="{{ route('auth.logout') }}" class="button_link">Log out</a>
            @endauth
            @guest
            <a href="{{ route('auth.loginPage') }}" class="button_link">Log in</a>
            @endguest
        </div>
    </div>
</nav>
