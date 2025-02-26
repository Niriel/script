<nav>
    <div id="navigation">
        <ul>
            <li class="navitem"><a href="{{ route('articles.index') }}">Home</a></li>
            <li class="navitem"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="navitem"><a href="{{ route('articles.create') }}">Create</a></li>
            @guest
            <li class="navitem"><a href="{{ route('login.index') }}">Log in</a></li>
            @endguest
            @auth
            <li class="navitem"><a href="{{ route('logout.perform') }}">Log out</a></li>
            @endauth
        </ul>
    </div>
    <hr />
</nav>
