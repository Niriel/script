@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@auth
<h1>Greetings, {{ Auth::user()->name }}</h1>

<section id="dashboard_user_info">
    <p>Member since {{Auth::user()->created_at}}.</p>
    @if(Auth::user()->has_premium)
    <p><span class="premium"><a href="{{ route('premium.index') }}">Premium member</a></span></p>
    @else
    <p><a href="{{ route('premium.index') }}">Become a Premium member</a>.</p>
    @endif
</section>

<section id="dashboard_write_new_article">
    <h2>Feeling chatty?</h2>
    <form action="{{ route('articles.create') }}" method="POST">
        @csrf
        @method('GET')
        <button type="submit">Write a new article</button>
    </form>
</section>

<section id="dashboard_articles">
    <h2>Your articles</h2>
    <p>Number of articles: {{ $articles->count() }}.</p>
    <ul>
        @foreach($articles as $article)
        <li>
            <article>
                <h2 class="article_title">
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    @if($article->is_premium)
                    <a href="{{ route('premium.index') }}" class="premium">Premium</a>
                    @endif
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
<h1>Greetings, visitor</h1>
<p>You may wish to
    <a href="{{ route('auth.loginPage') }}">log in</a>
    or return to the website's
    <a href="{{ route('articles.index') }}">home page</a>.
</p>
@endguest

@endsection
