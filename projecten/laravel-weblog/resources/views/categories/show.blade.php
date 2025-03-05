@extends('layouts.app')

@section('title', 'Category')

@section('content')
<header>
    <h1>Category: {{ $category->name }}</h1>
</header>

<section id="article_list">
    <header>
        <h2>Articles in {{ $category->name }}</h2>
        <p>Number of articles: {{ $articles->count() }}.</p>
    </header>
    <main>
        @foreach($articles as $article)
        <article class="article_box">
            <header class="article_header">
                <h2 class="article_title">
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                </h2>
                <div class="article_metadata left_right">
                    <div class="left">
                        <span class="author">{{ $article->user->name }}</span>
                        <span class="date">{{ $article->created_at }}</span>
                    </div>
                    <div class="right">
                        @if($article->is_premium)
                        <a href="{{ route('premium.index') }}" class="premium">Premium</a>
                        @endif
                    </div>
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
        </article>
        @endforeach
    </main>
</section>
@endsection
