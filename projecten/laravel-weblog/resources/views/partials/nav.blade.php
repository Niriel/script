<nav>
    <div id="navigation">
        <ul>
            <li class="navitem"><a href="{{ route('articles.index') }}">Home</a></li>
            @auth
            <li class="navitem"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="navitem"><a href="{{ route('auth.logout') }}">Log out</a></li>
            @endauth
            @guest
            <li class="navitem"><a href="{{ route('auth.loginPage') }}">Log in</a></li>
            @endguest
        </ul>
    </div>
    <hr />
</nav>
