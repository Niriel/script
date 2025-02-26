<nav>
    <div id="navigation">
        <ul>
            <li class="navitem"><a href="{{ route('articles.index') }}">Home</a></li>
            @auth
            <li class="navitem"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="navitem"><a href="{{ route('articles.create') }}">Write new article</a></li>
            <li class="navitem"><a href="{{ route('logout.perform') }}">Log out</a></li>
            @endauth
            @guest
            <li class="navitem"><a href="{{ route('login.index') }}">Log in</a></li>
            @endguest
        </ul>
    </div>
    <hr />
</nav>
