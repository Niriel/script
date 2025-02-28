@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>

@auth
<h2>Greetings, {{ auth()->user()->name }}</h2>
<section id="dashboard_write_new_article">
    <form action="{{ route('articles.create') }}" method="POST">
        @csrf
        @method('GET')
        <button type="submit">Write a new article</button>
    </form>
</section>
<section id="dashboard_articles">
    <h3>Your articles</h3>
    <p>Number of articles: {{ $articles->count() }}.</p>
    <ul>
        @foreach($articles as $article)
        <li>
            <article>
                <h2 class="article_title {{ $article->is_premium ? 'premium' : ''}}">
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    {{ $article->is_premium ? 'Premium' : ''}}
                </h2>

                <div class="article_header">
                    {{ $article->created_at }}
                </div>

                <blockquote class="article_excerpt">
                    {{ substr($article->content, 0, 500) }}
                    @if(mb_strlen($article->content) >= 500)
                    <a href="{{ route('articles.show', $article->id) }}">&hellip;</a>
                    @endif
                </blockquote>

                @if(Auth::id() === $article->user_id)
                <table class="article_modify">
                    <tr>
                        <td>
                            <form action="{{ route('articles.edit', $article->id) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit">Edit article</button>
                            </form>
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
            </article>
        </li>
        @endforeach
    </ul>
</section>
@endauth

@guest
<h2>Greetings, visitor</h2>
<p>You may wish to
    <a href="{{ route('auth.loginPage') }}">log in</a>
    or return to the website's
    <a href="{{ route('articles.index') }}">home page</a>.
</p>
@endguest

@endsection
