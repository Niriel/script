@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<header>
    <h1>Scriptlog</h1>
</header>

<section id="article_list">
    <header>
        <h2>Articles</h2>
    </header>
    <main>
        @foreach($articles as $article)
        <div class="article_preview">
            <header class="article_header">
                <h2 class="article_title">
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                </h2>
                <div>
                    {{ $article->created_at }}, by
                    {{ $article->user->name }}.
                    @if($article->is_premium)
                    <a href="{{ route('premium.index') }}" class="premium">Premium</a>
                    @endif
                </div>
            </header>
            <main class="article_excerpt">
                <p>
                    {{ substr($article->content, 0, 500) }}
                    @if(mb_strlen($article->content) >= 500)
                    <a href="{{ route('articles.show', $article->id) }}">&hellip;</a>
                    @endif
                </p>
            </main>
        </div>
        @endforeach
    </main>
</section>
@endsection
