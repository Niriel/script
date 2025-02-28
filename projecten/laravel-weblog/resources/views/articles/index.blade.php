@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<h1>Scriptlog</h1>
<section id="article_list">
    <h2>Articles</h2>
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
                    {{ $article->created_at }}, by
                    {{ $article->user->name }}.
                </div>
                <blockquote class="article_excerpt">
                    {{ substr($article->content, 0, 500) }}
                    @if(mb_strlen($article->content) >= 500)
                    <a href="{{ route('articles.show', $article->id) }}">&hellip;</a>
                    @endif
                </blockquote>
            </article>
        </li>
        @endforeach
    </ul>
</section>
@endsection
