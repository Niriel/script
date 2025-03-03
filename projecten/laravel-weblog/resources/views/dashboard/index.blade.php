@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@auth
<header>
    <h1>Greetings, {{ Auth::user()->name }}</h1>
</header>

<section id="dashboard_user_info">
    <p>Member since {{Auth::user()->created_at}}.</p>
    @if(Auth::user()->has_premium)
    <p><a href="{{ route('premium.index') }}" class="premium">Premium member</a></p>
    @else
    <p><a href="{{ route('premium.index') }}" class="premium">Become a Premium member</a>.</p>
    @endif
</section>

<section id="dashboard_write_new_article">
    <h2>Feeling chatty?</h2>
    <a href="{{ route('articles.create') }}" class="button_link">Write a new article</a>
</section>

<section id="dashboard_articles">
    <header>
        <h2>Your articles</h2>
        <p>Number of articles: {{ $articles->count() }}.</p>
    </header>
    <main>
        @foreach($articles as $article)
        <div class="article_box">
            <header class="article_header">
                <h2 class="article_title">
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                </h2>
                <div class="article_metadata">
                    {{ $article->created_at }}.
                    @if($article->is_premium)
                    <a href="{{ route('premium.index') }}" class="premium">Premium</a>
                    @endif
                </div>
            </header>
            <main class="article_content">
                <p>
                    {{ substr($article->content, 0, 500) }}
                    @if(mb_strlen($article->content) >= 500)
                    <a href="{{ route('articles.show', $article->id) }}">&hellip;</a>
                    @endif
                </p>
            </main>
            <footer>
                @if(Auth::id() === $article->user_id)
                <table>
                    <tr>
                        <td>
                            <a href="{{ route('articles.edit', $article->id) }}" class="button_link">Edit article<a>
                        </td>
                        <td>
                            <form action="{{ route('articles.delete', $article->id) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit">Delete article</button>
                            </form>
                        </td>
                    </tr>
                </table>
                @endif
            </footer>
        </div>
        @endforeach
    </main>
</section>
@endauth

@guest
<h1>Greetings, visitor</h1>
<p>You may wish to
    <a href="{{ route('auth.loginPage') }}">log in</a>
    or return to the website's
    <a href="{{ route('articles.index') }}">home page</a>.
</p>
@endguest

@endsection
